<?php
// src/Security/AppAuthenticator.php
namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AppCustomAuthenticator extends AbstractAuthenticator
{
    private RouterInterface $router;
    private $entityManager;
    public function __construct(RouterInterface $router,EntityManagerInterface $entityManager)
    {
        $this->entityManager=$entityManager;
        $this->router = $router;
    }

    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'app_login' && $request->isMethod('POST');
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('_username', '');
        $password = $request->request->get('_password', '');

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($password)
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?RedirectResponse
    {
        $user = $token->getUser();
        $userInfo = $this->entityManager->getRepository(User::class)->find($user->getId());
        // Check if the user is active
        if ($userInfo->getIsActive()==0) {
            // Invalidate the session and add a flash message
            $request->getSession()->invalidate();
            $request->getSession()->getFlashBag()->add('error', 'Votre compte est inactif.');
    
            return new RedirectResponse($this->router->generate('app_login'));
        }
    
        // Redirect to the home page if the user is active
        return new RedirectResponse($this->router->generate('app_home'));
    }
    
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?RedirectResponse
    {
        $request->getSession()->getFlashBag()->add('error', $exception->getMessage());

        return new RedirectResponse($this->router->generate('app_login'));
    }
}
