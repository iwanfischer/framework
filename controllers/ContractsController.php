<?php

class ContractsController
{
    protected $contractsRepository;

    public function __construct(ContractsRepository $contractsRepository)
    {
        $this->contractsRepository = $contractsRepository;
    }

    public function showAction(Request $request)
    {
        $contracts = $this->contractsRepository->getAll();
        return new Response(
            $this->render('contracts', [
                'contracts' => $contracts
            ])
        );
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