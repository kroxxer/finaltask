<?php

namespace App\Controller;

use App\Repository\IssueRepository;
use DH\Adf\Node\Block\Document;
use Doctrine\ORM\EntityManagerInterface;
use JiraCloud\ADF\AtlassianDocumentFormat;
use JiraCloud\Issue\IssueField;
use JiraCloud\Issue\IssueService;
use JiraCloud\JiraException;
use JiraCloud\User\UserService;
use JsonMapper_Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SupportController extends AbstractController
{
    #[Route('/support', name: 'app_support')]
    public function index(Request $request, EntityManagerInterface $entityManager, IssueRepository $issueRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $issueRepository->findOneBy(array('email' => $this->getUser()->getEmail()));
        if ($user === null) {
            try {
                $userService = new UserService();

                $user = $userService->create([
                    'name' => $this->getUser()->getName(),
                    'password' => 'abracadabra',
                    'emailAddress' => $this->getUser()->getEmail(),
                    'displayName' => $this->getUser()->getName(),
                    'products' => ['jira-core', 'jira-software', 'jira-servicedesk' ]
                ]);

                $issueField = new IssueField();

                $doc = (new Document())
                    ->paragraph()           // paragraph, can have child blocks (needs to be closed with `->end()`)
                    ->text('Full description for issue  ')    // simple unstyled text
                    ->end()    ;             // closes `paragraph` node

                $descV3 = new AtlassianDocumentFormat($doc);

                $issueField->setProjectKey('KAN')
                    ->setAssigneeAccountId($user->accountId)
                    ->setSummary('something\'s wrong')
                    ->setAssigneeNameAsString('lesstif')
                    ->setPriorityNameAsString('Critical')
                    ->setIssueTypeAsString('Bug')
                    ->setDescription($descV3)
                    ->addVersionAsString('1.0.1')
                    ->addVersionAsString('1.0.3')
                    ->addCustomField('customfield_10000', ['URL', $request->getBaseUrl()]) // String type custom field
                    ->addCustomField('customfield_10200', ['value' => 'Linux']) // Select List (single choice)
                    ->addCustomField('customfield_10408', [
                        ['value' => 'opt2'], ['value' => 'opt4']
                    ]) // Select List (multiple choice)
                ;

                $issueService = new IssueService();

                $ret = $issueService->create($issueField);
                dd($ret);
            } catch (JiraException|JsonMapper_Exception $e) {
                dd($e);
            }
        }

        return $this->render('support/index.html.twig', [
                'controller_name' => 'SupportController',
        ]);
    }
}
