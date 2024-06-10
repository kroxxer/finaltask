<?php

namespace App\Controller;

use DH\Adf\Node\Block\Document;
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
    public function index(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        try {
            $userService = new UserService();

            // get the user info.
            $userService->findUsersByQuery(["query" => $this->getUser()->getEmail()]);
        } catch (JsonMapper_Exception $e) {
            dd($e->getCode());
            if ($e->getCode() === 404) {
                $userService = new UserService();

                $userService->create([
                    'name' => $this->getUser()->getName(),
                    'password' => 'abracadabra',
                    'emailAddress' => $this->getUser()->getEmail(),
                    'displayName' => $this->getUser()->getName(),
                ]);
            }
        } catch (JiraException $e) {
            dd($e);
        } finally {
            $issueField = new IssueField();

            $doc = (new Document())
                ->paragraph()           // paragraph, can have child blocks (needs to be closed with `->end()`)
                ->text('Full description for issue  ')    // simple unstyled text
                ->end()    ;             // closes `paragraph` node

            $descV3 = new AtlassianDocumentFormat($doc);

            $issueField->setProjectKey('AB')
                ->setSummary('something\'s wrong')
                ->setAssigneeNameAsString('lesstif')
                ->setPriorityNameAsString('Critical')
                ->setIssueTypeAsString('Bug')
                ->setDescription($descV3)
                ->setReporterName($this->getUser()->getName())
                ->addVersionAsString('1.0.1')
                ->addVersionAsString('1.0.3')
                ->addCustomField('url', $request->getBaseUrl()) // String type custom field
                ->addCustomField('customfield_10200', ['value' => 'Linux']) // Select List (single choice)
                ->addCustomField('customfield_10408', [
                    ['value' => 'opt2'], ['value' => 'opt4']
                ]) // Select List (multiple choice)
            ;

            $issueService = new IssueService();

            $ret = $issueService->create($issueField);
        }

        return $this->render('support/index.html.twig', [
                'controller_name' => 'SupportController',
        ]);
    }
}
