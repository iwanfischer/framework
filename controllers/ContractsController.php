<?php

class ContractsController
{
    protected $contractsRepository;

    public function __construct(ContractsRepository $contractsRepository)
    {
        $this->contractsRepository = $contractsRepository;
    }

    public function contractsAction(Request $request)
    {
        $contract = $this->contractsRepository->getAll();
        return new Response(
            $this->render('contracts', [
                'contracts' => $contract
            ])
        );
    }

    public function showAction(Request $request)
    {
        $id = $request->getQueryParameter("id");

        $contract = is_numeric($id) ? $this->contractsRepository->getById($id) : null;

        if ($contract === null) {
            return new Response('Page not found', '404', 'Not found');
        }

        return new Response(
            $this->render('contracts', [
                'contracts' => $contract
            ])
        );
    }

    /**
     * Show form for new contract.
     * @param Request $request
     * @return Response
     */
    public function createFormAction(Request $request)
    {
        return new Response (
            $this->render('contracts/form', [])
        );

    }

    /**
     * Add new contract
     * @param Request $request
     * @return Response|void
     */
    public function createAction($request)
    {
        if ($request->isPost() && !empty($request->getRequestParameter('contracts'))) {

            $contracts = $request->getRequestParameter('contracts');
            $agentsValidator = new AgentsValidator();

            $errors = $agentsValidator->validate($contracts);
            if (empty($errors)) {
                $this->contractsRepository->add(
                    $contracts[agent], $contracts[complex], $contracts[rewardType], $contracts[rewardSize], $contracts[validity], $contracts[contractDate]);

                return new Response(
                    '/contracts', '301', 'Moved'
                );
            } else {
                return new Response (
                    $this->render('contracts/form', [
                        'errors' => $errors
                    ])
                );
            }
        }
    }


    protected function render($templateName, $vars = [])
    {
        ob_start();
        extract($vars);
        include sprintf('templates/%s.php', $templateName);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function __call($name, $arguments)
    {
        return new Response('Sorry but this action not found',
            '404', 'Not found');
    }
}