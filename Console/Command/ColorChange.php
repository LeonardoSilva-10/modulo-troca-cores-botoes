<?php
namespace Leonardo\Test\Console\Command;

use Magento\Framework\Console\Cli;
use Magento\Framework\App\State;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Leonardo\Test\Model\ColorChange as ModelColorChange;

class ColorChange extends Command
{
    private const INPUT_COLOR = 'color-hex';
    private const STORE_ID = 'store-id';
    /**
     * @var ModelColorChange
     */
    protected ModelColorChange $modelColorChange;
    /**
     * @var State
     */
    protected State $appState;
    /**
     * Constructor
     *
     * @param ModelColorChange $modelColorChange
     * @param State $appState
     */
    public function __construct(
        ModelColorChange $modelColorChange,
        State $appState
    ) {
        $this->modelColorChange = $modelColorChange;
        $this->appState = $appState;
        parent::__construct();
    }
    /**
     * {@inheritdoc}
     */
    protected function configure(): void
    {
        $this->setName('color:change')
             ->setDescription('Change color the buttons store view')
             ->addArgument(
                 self::INPUT_COLOR,
                 InputArgument::REQUIRED,
                 'Color HEX'
             )
            ->addArgument(
                self::STORE_ID,
                InputArgument::REQUIRED,
                'Store ID'
            );
        parent::configure();
    }
    /**
     * Function for execute CLI commands
     *
     * {@inheritdoc}
     * @throws \ErrorException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $color = $input->getArgument(self::INPUT_COLOR);
        $storeID = $input->getArgument(self::STORE_ID);
        if ($this->appState->getMode() != State::MODE_DEVELOPER) {
            $output->writeln("Deploy mode is not developer");
            return Cli::RETURN_FAILURE;
        } else {
            $this->modelColorChange->colorChange($color, $storeID);
            $output->writeln('Buttons Color Changed!');
            return Cli::RETURN_SUCCESS;
        }
    }
}
