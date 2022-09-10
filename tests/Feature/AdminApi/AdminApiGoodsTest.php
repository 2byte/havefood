<?
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Goods;

uses(RefreshDatabase::class);

test('api getting single goods', function () {
  $user = seedsForGoods(except: 'option');
  
  makeBoss($user, $this);
  
  $goods = Goods::first();
  
  $data = makeUploads($this, $goods);
  
  $response = $this->postJson('/api/gov/goods/get', [
    'id' => $goods->id
  ]);
  
  $response->dump();
  $response->assertStatus(200);
});