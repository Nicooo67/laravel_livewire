<?php

namespace App\Livewire;

use App\Models\Carte;
use Livewire\Component;
use App\Models\Element;

class CartesComponent extends Component
{
    public $cartes;            // Variable pour stocker les cartes
    public $isEditing = false; // Pour savoir si on est en mode édition
    public $editingCarteId;    // L'ID de la carte en cours d'édition
    public $editingLibelle;    // Le libellé de la carte en cours d'édition
    public $editingDescription; // La description de la carte en cours d'édition
    public $elementLibelle = ''; // Libellé de l'élément à ajouter

    public function mount()
    {
        $this->loadCartes();
        $this->elementLibelle = '';
    }

    public function loadCartes()
    {
        // Récupération des cartes classées par ordre alphabétique
        $this->cartes = Carte::orderBy('libelle', 'asc')->get();
    }

    public function deleteCarte($carteId)
    {
        Carte::find($carteId)->delete();
        $this->loadCartes();
    }

    public function startEditing($carteId)
    {
        $carte = Carte::find($carteId);
        $this->editingCarteId = $carte->id;
        $this->editingLibelle = $carte->libelle;
        $this->editingDescription = $carte->description;
        $this->isEditing = true;
    }

    public function cancelEditing()
    {
        $this->reset(['isEditing', 'editingCarteId', 'editingLibelle', 'editingDescription']);
    }

    public function saveEditing()
    {
        $this->validate([
            'editingLibelle' => 'required'
        ]);

        if ($this->editingCarteId) {
            $carte = Carte::find($this->editingCarteId);
            $carte->update([
                'libelle' => $this->editingLibelle,
                'description' => $this->editingDescription,
            ]);
            $this->loadCartes();
        }

        $this->cancelEditing();
    }

    public function addElement(Carte $carte)
    {
        $this->validate([
            'elementLibelle' => 'required'
        ]);

        $element = new Element(['libelle' => $this->elementLibelle]);
        $carte->elements()->save($element);

        $this->elementLibelle = ''; // réinitialiser
        $this->loadCartes(); // recharger les cartes pour montrer le nouvel élément
    }

    public function deleteElement($elementId)
    {
        $element = Element::find($elementId);

        if ($element) {
            $element->delete();
            $this->loadCartes(); // Rechargez les cartes pour mettre à jour la liste des éléments
        }
    }

    public function render()
    {
        return view('livewire.cartes-component');
    }
}
