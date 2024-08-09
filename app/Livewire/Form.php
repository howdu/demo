<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\View\View;
use Livewire\Component;

/**
 * @property-read Forms\Form $form
 */
class Form extends Component implements HasForms, HasActions
{
    use InteractsWithForms;
    use InteractsWithActions;

    /** @var array<string, mixed> */
    public $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function testAction(): Action
    {
        return Action::make('test')
            ->label(fn (array $arguments): string => "Test {$arguments['foo']}")
            ->visible(fn (array $arguments): bool => $arguments['foo'] == 'bar');
    }

    /** @return Forms\Components\Component[] */
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Builder::make('test')
                ->blocks([
                    Forms\Components\Builder\Block::make('one')
                        ->schema([
                            Forms\Components\TextInput::make('one'),
                        ]),
                    Forms\Components\Builder\Block::make('two')
                        ->schema([
                            Forms\Components\TextInput::make('two'),
                        ]),
                ]),
        ];
    }

    public function submit(): never
    {
        dd($this->form->getState());
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    public function render(): View
    {
        return view('livewire.form');
    }
}
