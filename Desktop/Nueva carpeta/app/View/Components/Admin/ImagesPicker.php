<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class ImagesPicker extends Component
{
    public $currentImages;
    public $name;
    public $urlToDelete;
    public $urlToDeleteIdPlaceholder;

    public function __construct(array $currentImages = [], $name = null, ?string $urlToDelete = null, ?string $urlToDeleteIdPlaceholder = '__id__')
    {
        $this->currentImages = $currentImages;
        $this->name = $name;
        $this->urlToDelete = $urlToDelete;
        $this->urlToDeleteIdPlaceholder = $urlToDeleteIdPlaceholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.admin.images-picker', [
            'name' => $this->name
        ]);
    }
}
