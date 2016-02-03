<?php
/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pproenca\Behat;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * Entry point for operations related with the bootstrap file.
 *
 * Configuration and file inclusion are done through this service class.
 *
 * @package Pproenca\Behat
 */
class BootstrapFileService
{
    /**
     * Define expected configuration structure and validate it's values.
     *
     * @param \Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition $definition
     */
    public function configure(ArrayNodeDefinition $definition)
    {
        $definition
            ->children()
                ->booleanNode('require_once')
                    ->info('Decides whether the as require_once call is needed.')
                    ->defaultFalse()
                ->end()
                ->scalarNode('bootstrap_path')
                    ->info('Path string for bootstrap file to be included.')
                    ->isRequired()
                    ->validate()
                        ->ifTrue($this->thatFileDoesNotExist())
                            ->thenInvalid("Failed to find file.")
                ->end()
            ->end();
    }

    /**
     * Include configured bootstrap file.
     *
     * @param array $config
     */
    public function load(array $config)
    {
        $bootstrapFileName = realpath($config['bootstrap_path']);

        if ($config['require_once']) {
            require_once $bootstrapFileName;
            return;
        }

        require $bootstrapFileName;
    }

    /**
     * Expectation of file being missing.
     *
     * @return \Closure
     */
    private function thatFileDoesNotExist()
    {
        return function ($fileName) {
            return !file_exists($fileName);
        };
    }
}