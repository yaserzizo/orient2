<?php


use App\Models\Products\Brand;
use App\Models\Products\Category;
use App\Models\Products\Product;
use App\Models\Products\ProductPrerequisite;
use App\Models\Products\ProductType;
use App\Models\Products\SubCategory;
use App\Models\Products\Uom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call(UsersTableSeeder::class);
/*        $users = factory(Category::class, 4)->create();
        $users = factory(SubCategory::class, 6)->create();
        $users = factory(Brand::class, 6)->create();
        $users = factory(ProductType::class, 3)->create();
        $users = factory(Uom::class, 3)->create();
        $users = factory(Product::class, 50)->create();
        $users = factory(ProductPrerequisite::class, 20)->create();*/
       // $users = factory(App\Models\Suppliers\Supplier::class, 20)->create();
        $users = factory(App\Models\Suppliers\SupplierContact::class, 100)->create();
        Model::reguard();
    }
}
