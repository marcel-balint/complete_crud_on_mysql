<?php

class City
{
    public ?int $id = null;
    public $country_id = null;
    public ?string $name = null;
    public ?string $district = null;
    public ?string $population = null;

    public function delete($id)
    {
        return DB::delete("DELETE FROM cities WHERE id = :id", ['id' => $id]);
    }
    public function fetchOneFromDB($id, $object)
    {
        return DB::selectOne("SELECT * FROM `cities` WHERE `id` = :id", ['id' => $id], $object);
    }
    public function insertNewCityToDB()
    {
        return DB::insert("INSERT INTO cities (name, district, population) VALUES 
        ('$this->name', '$this->district', '$this->population');
        ");
    }

    public function updateNewCityToDB($id)
    {
        $query = "UPDATE cities SET name = :name, district = :district, population = :population WHERE id = :id";
        $params = [
            'name' => $this->name,
            'district' => $this->district,
            'population' => $this->population,
            'id' => $id,
        ];
        return DB::update($query, $params);
    }
}
