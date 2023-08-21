<?php
namespace Leonardo\Test\Console\Command;

use Magento\Framework\Console\Cli;
use Magento\Framework\App\State;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Leonardo\Test\Model\ColorDelete as DeleteModel;

class ColorDelete extends Command
{
    private const STORE_ID = 'store-id';
    /**
     * @var DeleteModel
     */
    protected DeleteModel $deleteModel;
    /**
     * @var State
     */
    protected State $appState;
    /**
     * Constructor
     *
     * @param DeleteModel $deleteModel
     * @param State $appState
     */
    public function __construct(
        DeleteModel $deleteModel,
        State $appState
    ) {
        $this->deleteModel = $deleteModel;
        $this->appState = $appState;
        parent::__construct();
    }
    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setName('color:delete')
            ->setDescription('Delete color associated with Store ID')
            ->addArgument(
                self::STORE_ID,
                InputArgument::REQUIRED,
                'Store ID'
            );
        parent::configure();
    }
    /**
     * function for execute CLI commands
     *
     * {@inheritdoc}
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $storeID = $input->getArgument(self::STORE_ID);
        if ($this->appState->getMode() != State::MODE_DEVELOPER) {
            $output->writeln("Deploy mode is not developer");
            return Cli::RETURN_FAILURE;
        } else {
            $this->deleteModel->colorDelete($storeID);
            $output->writeln('Color Associated with Store Id Deleted!');
            return Cli::RETURN_SUCCESS;
        }
    }
}
