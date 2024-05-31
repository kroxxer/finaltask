<?php

namespace App\Security;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\SecurityRequestAttributes;

class AuthenticationFailureHandler implements AuthenticationFailureHandlerInterface
{

    public function __construct(private readonly UrlGeneratorInterface $urlGenerator)
    {
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): Response
    {
        if ($exception instanceof BadCredentialsException)
            $exception = new CustomUserMessageAuthenticationException('Don\'t have matched email');
        dump('hehe');
        $request->getSession()->set(SecurityRequestAttributes::AUTHENTICATION_ERROR, $exception);
        return new RedirectResponse($this->urlGenerator->generate('app_login'));
    }
}