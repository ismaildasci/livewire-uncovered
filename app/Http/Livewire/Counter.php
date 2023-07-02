<?php

declare(strict_types=1);

namespace App\Http\Livewire;

class Counter
{
    public $count = 0;

    public function increment(): void
    {
        $this->count++;
    }

    public function render()
    {
        return <<<'HTML'
            <div class="counter">
                <span>{{ $count }}</span>

                <button wire:click="increment">+</button>
            </div>
        HTML;
    }
}
