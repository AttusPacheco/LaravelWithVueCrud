<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserJsonResource;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service = new UserService()
    ) {}

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $users = $this->service->search($request);

        return response()
            ->json([
                'users' => UserJsonResource::collection($users),
                'pagination' => [
                    'pages' => $users->lastPage(),
                    'page' => $users->currentPage(),
                ]
            ]);
    }

    /**
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        $this->service->store($request);

        return response()
            ->json(['message' => 'Sucesso']);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()
            ->json($this->service->find($id)?->toJson());
    }
    public function update(int $id, UserRequest $request)
    {
        $this->service->update($id, $request);

        return response()
            ->json(['message' => 'Sucesso']);
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id)
    {
        $this->service->delete($id);

        return response()
            ->json(['message' => 'Sucesso']);
    }
}
