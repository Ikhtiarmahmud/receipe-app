<?php


namespace App\Services;


use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Illuminate\Support\Str;
use App\Repositories\CustomerRepository;

class CustomerService
{
    use CrudTrait;
    use FileTrait;

    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->setActionRepository($this->customerRepository);
    }

    public function saveCustomerInfo(array $data)
    {
        if(!empty($data['image'])) {
            $filename = $this->saveImage($data);
            $data['image'] = $filename;
        }

        $this->save($data);
    }

    public function updateCustomerInfo(array $data, int $id)
    {
        $book = $this->findOne($id);

        if (!empty($data['image'])) {
            $this->deleteFile($book['image']);
            $data['image'] = $this->saveImage($data);
        }

        $book->update($data);
    }

    private function saveImage($data): string
    {
        $extension       = $data['image']->getClientOriginalExtension();
        $file_name       = 'images'.'-'.Str::random(30).'.'.$extension;
        $this->upload($data['image'], 'images', $file_name);

        return $file_name;
    }
}
