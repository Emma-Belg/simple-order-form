<?php
namespace Model;

class OrderForm
{
    private $email = '';
    private $streetName = '';
    private $streetNumber = '';
    private $city = '';
    private $postcode = '';
    private $sendMessage = '';
    private $deliveryTime = '';
    private $productNames;
    private $productPrice = 0;

    /**
     * OrderForm constructor.
     */
    public function __construct(float $totalPrice)
    {
        $product = new Products();
        $this->productNames = $product->getFood();
        $this->productPrice = $product->getPrice($totalPrice);
    }

    public function validate(EmailCheck $email, FormCheckRequired $form)
    {
        $delivery = new DeliveryTime();

        $this->email =  $email->email($_POST["email"]);
        $this->streetName = $form->lettersOnly("street");
        $this->streetNumber = $form->numberOnly("streetnumber");
        $this->city = $form->lettersOnly("city");
        $this->postcode = $form->numberOnly("zipcode");
        $this->sendMessage = $form->sentMessage();
        $this->deliveryTime = $delivery->deliveryTime();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getStreetName(): string
    {
        return $this->streetName;
    }

    /**
     * @return string
     */
    public function getStreetNumber(): string
    {
        return $this->streetNumber;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getPostcode(): string
    {
        return $this->postcode;
    }

    /**
     * @return string
     */
    public function getSendMessage(): string
    {
        return $this->sendMessage;
    }

    /**
     * @return string
     */
    public function getDeliveryTime(): string
    {
        return $this->deliveryTime;
    }

    /**
     * @return array
     */
    public function getProductNames(): array
    {
        return $this->productNames;
    }

    /**
     * @return float
     */
    public function getProductPrice(): float
    {
        return $this->productPrice;
    }
}