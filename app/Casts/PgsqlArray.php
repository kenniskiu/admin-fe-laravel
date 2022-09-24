namespace App\Casts;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PgsqlArray implements CastsAttributes
{
    public function get($model, string $key , $value , array $attributes){
        dd($model);
    }
    public function user(){
    }
}
