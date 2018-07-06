<?php

namespace Action;

use Core\AbstractAction;
use Core\Encoder\{JsonEncoder, PasswordEncoder};
use Core\Http\Exception\{BadRequestHttpException, NotFoundHttpException, UnauthorizedHttpException};
use Core\Http\Response\JsonResponse;
use Core\Http\Request;
use Repository\Pdo\UserRepository;
use Validator\SigninValidator;

/**
 * Class SigninAction
 * @package Action
 */
class SigninAction extends AbstractAction
{
    /**
     * @inheritdoc
     */
    public function handle(Request $request): JsonResponse
    {
        $encoder = new JsonEncoder();
        $data = $encoder->decode($request->getBody());

        $validator = new SigninValidator();
        if (!$validator->validate($data)) {
            throw new BadRequestHttpException();
        }

        $repository = new UserRepository($this->app->getPdo());

        $user = $repository->findByEmail($data['email']);
        if ($user === null) {
            throw new NotFoundHttpException();
        }

        if (!(new PasswordEncoder())->verify($data['password'], $user->getPassword())) {
            throw new UnauthorizedHttpException();
        }

        return new JsonResponse(['data' => 'token here']);
    }
}
