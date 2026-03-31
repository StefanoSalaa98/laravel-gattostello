<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cat extends Model
{
    // solo i campi presenti in $fillable possono essere riempiti
    protected $fillable = [
        'name',
        'slug',
        'sex',
        'date_of_birth',
        'coat',
        'info',
        'image',
        'adottato',
        'prenotato'
    ];

    // Metodo speciale di Laravel che viene eseguito automaticamente quando il model viene “avviato”
    protected static function booted()
    {
        // prima di ogni save o update Laravel esegue questa funzione
        static::saving(function ($cat) {
            $cat->slug = self::generateUniqueSlug($cat->name, $cat->id);
        });
    }

    // se $id non viene passato sono nella store
    // se $id viene passato sono nella update
    public static function generateUniqueSlug($name, $id = null)
    {
        // converto il nome in slug
        $baseSlug = Str::slug($name);
        $slug = $baseSlug;
        $counter = 1;

        while (
            // Cerco se esiste un record con questo slug
            self::where('slug', $slug)
                // se id esiste prendo la query e aggiungo where id diverso da questo id
                ->when($id, fn($query) => $query->where('id', '!=', $id))
                ->exists()
        ) {
            // allora aggiungo allo slug il numero del contatore
            $slug = $baseSlug . '-' . $counter;
            // e incremento il contatore stesso
            $counter++;
        }

        return $slug;
    }

    // cerca il gatto corrispondente o per id o per slug, a sceonda di cosa viene passato
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('id', $value)
            ->orWhere('slug', $value)
            ->firstOrFail();
    }
}
