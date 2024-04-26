<div>
    <!-- Formulaire pour ajouter une carte -->
    <div class="mt-3 mx-5 p-4 bg-gray-100 border-2">
        <h3 class="text-xl font-bold mb-3">Ajouter une nouvelle carte</h3>
        
        <input type="text" class="border p-2 rounded w-full" placeholder="Libellé de la carte" wire:model="libelle">
        
        @error('libelle') 
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        
        <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" wire:click="createCarte">Ajouter</button>
    </div>

    <!-- Affichage des cartes -->
    @foreach($cartes as $carte)
        <div class="card mt-3 mx-5 border-2 p-4 bg-white">
            <div class="card-body">
                @if($isEditing && $editingCarteId === $carte->id)
                    <input type="text" class="border p-2 rounded w-full" wire:model="editingLibelle">
                    @error('editingLibelle') 
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <textarea class="border p-2 rounded w-full mt-2" wire:model="editingDescription"></textarea>
                    
                    <div class="mt-3">
                        <button class="bg-green-500 text-white px-4 py-2 rounded" wire:click="saveEditing">Sauvegarder</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded" wire:click="cancelEditing">Annuler</button>
                    </div>
                @else
                    <h5 class="card-title text-xl font-bold">{{ $carte->libelle }}</h5>
                    @if($carte->description)
                        <p class="card-text">{{ $carte->description }}</p>
                    @endif
                    <button class="text-blue-500 underline" wire:click="startEditing({{ $carte->id }})">Éditer</button>
                    <button class="text-red-500 underline ml-2" wire:click="deleteCarte({{ $carte->id }})">Supprimer la carte</button>

                    <!-- Affichage des éléments attachés à la carte -->
                    @foreach($carte->elements as $element)
                        <div class="mt-3 mx-5 p-4 bg-white border-2">
                            <!-- Afficher le libellé de l'élément -->
                            <p>{{ $element->libelle }}</p>
                            
                            <!-- Bouton de suppression de l'élément -->
                            <button class="text-red-500 underline ml-2" wire:click="deleteElement({{ $element->id }})">Supprimer l'élément</button>
                        </div>
                    @endforeach

                    <!-- Formulaire pour ajouter un élément à la carte -->
                    <div class="mt-3">
                        <input type="text" class="border p-2 rounded w-full" placeholder="Libellé de l'élément" wire:model="elementLibelle">
                        @error('elementLibelle') 
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <button class="mt-2 bg-green-500 text-white px-4 py-2 rounded" wire:click="addElement({{ $carte->id }})">Ajouter un élément</button>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
