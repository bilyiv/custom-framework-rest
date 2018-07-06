<?php

namespace Action;

use Core\AbstractAction;
use Core\Encoder\{JsonEncoder, PasswordEncoder};
use Core\Http\Exception\{BadRequestHttpException, InternalServerHttpException};
use Core\Http\Response\JsonResponse;
use Core\Http\Request;
use Entity\User;
use Repository\Pdo\UserRepository;
use Validator\SignupValidator;

/**
 * Class SignupAction
 * @package Action
 */
class SignupAction extends AbstractAction
{
    /**
     * @inheritdoc
     */
    public function handle(Request $request): JsonResponse
    {
        $encoder = new JsonEncoder();
        $data = $encoder->decode($request->getBody());

        $validator = new SignupValidator();
        if (!$validator->validate($data)) {
            throw new BadRequestHttpException();
        }

        $passwordEncoder = new PasswordEncoder();

        $user = new User();
        $user->setEmail($data['email']);
        $user->setPassword($passwordEncoder->encode($data['password']));

        $repository = new UserRepository($this->app->getPdo());
        if (!$repository->create($user)) {
            throw new InternalServerHttpException();
        }

        return new JsonResponse(['data' => $user->toArray()], 201);
    }
}
