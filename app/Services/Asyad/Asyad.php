<?php
namespace App\Services\Asyad;

use Illuminate\Support\Facades\Http;

class Asyad{
  public $baseUrl ="https://apix.stag.asyadexpress.com/v2/";
    public function asyadLogin()
    {
      
           
      $response =  Http::withHeaders([
        'Content-Type'=>'application/json',
       
     ])
     ->withToken('ztaMQTcYpWF7XZlXgDWOcdSfNS_w00kD','Bearer')
        ->get('https://apix.stag.asyadexpress.com/me');
        
        return $response;
    }
    
    public function pushOrder($order){

      $response_order =  Http::withHeaders([
        "Content-Type" => "application/json"
           
        ])->withToken('ztaMQTcYpWF7XZlXgDWOcdSfNS_w00kD')

        ->post($this->baseUrl.'orders',[
          "ClientOrderRef"=> $order->transaction_id,
          "Description"=> "string",
          "HandlingType"=> "Packaging",
          "ShippingCost"=> 20,
          "PaymentType"=> $order->payment_method,
          "CODAmount"=> $order->cod_amount,
          "ShipmentProduct"=> "EXPRESS",
          "ShipmentService"=> "ALL_DAY",
          "OrderType"=> "DROPOFF",
          "PickupType"=> "NEXTDAY",
          "PickupDate"=> "11/20/2021",
          "TotalShipmentValue"=> 222,
          "JourneyOptions"=> [
          "AdditionalInfo"=> 0,
          "NOReturn"=> true,
          "Extra"=> []
           ],
          "Consignee"=> [
          "Name"=> $order->customer->fname." ". $order->customer->lname,
          "PUDOId"=> 0,
          "MobileNo"=>$order->customer->phone,
          "Email"=> $order->customer->email,
         // "ReferenceNo"=> "",
          //"CompanyName"=> "",
          "AddressLine1"=> $order->customer->street,
          "AddressLine2"=> "",
          "Area"=> $order->customer->area,
          "City"=> $order->customer->city,
          "Region"=> $order->customer->state,
          "Country"=> $order->customer->country,
          "ZipCode"=> $order->customer->postal_code,
          "Latitude"=> 0.0,
          "Longitude"=> 0.0,
          //"Instruction"=> "",
         // "Vattaxcode"=> "",
         // "Eorinumber"=> ""
           ],
          "Shipper"=> [
          "ReturnAsSame"=> true,
         // "CompanyName"=> "",
          "ContactName"=> "mohammed",
          "AddressLine1"=> "muscat",
         // "AddressLine2"=> "",
          "Area"=> "Muscat",
          "City"=> 'Muscat',
          "Region"=> "Muscat",
          "Country"=> "Oman",
          "ZipCode"=> "113",
         "Latitude"=> 20.566621780395508,
         "Longitude"=> 56.157962799072266,
          "MobileNo"=> "+968 24922000",
         // "TelephoneNo"=> "",
          "Email"=> "luay@gmail.com",
         // "ReferenceOrderNo"=> "",
         // "NationalId"=> "",
         //"What3Words"=> "string",
          //"Vattaxcode"=> "",
          //"Eorinumber"=> "",
          ],
          "Return"=> [
        //  "CompanyName"=> "",
          "ContactName"=> "mohamed",
          "AddressLine1"=> "musact",
        //  "AddressLine2"=> "",
         // "Area"=> "",
          "City"=> 'Muscat',
        //  "Region"=> "",
          "Country"=> "Oman",
          "ZipCode"=> "113",
         // "Latitude"=> 0,
        //  "Longitude"=> 0,
          "MobileNo"=> "972598680745",
        //  "TelephoneNo"=> "",
        //  "Email"=> "",
        //  "NationalId"=> "",
        //  "What3Words"=> "",
         // "Vattaxcode"=> "",
         // "Eorinumber"=> "",
        
          ],
          "PackageDetails"=> [
          [
          "Weight"=> 7,
          "Width"=> 1,
          "Length"=> 1,
          "Height"=> 1
        ]
          ],
          "ShipmentPerformaInvoice"=> [
        [  
          "HSCode"=> "6110.20.2070",
          "ProductDescription"=> "string",
          "ItemQuantity"=> 3,
          "ProductDeclaredValue"=> 3,
         // "itemRef"=> "",
          "ShipmentTypeCode"=> "Document",
          "PackageTypeCode"=> "POUCH"
         ]
          ]
      ]);
        
        return json_decode($response_order);
    }


    public function getcountries(){
      $countries =  Http::withHeaders([
            'Content-Type'=>'application/json',
           
        ])->withToken('ztaMQTcYpWF7XZlXgDWOcdSfNS_w00kD')
        ->get('http://apix.stag.asyadexpress.com/v2/countries');
        
        return json_decode($countries);
    }

    public function getcities(){
      $countries =  Http::withHeaders([
            'Content-Type'=>'application/json',
           
        ])->withToken('ztaMQTcYpWF7XZlXgDWOcdSfNS_w00kD')
        ->get('http://apix.stag.asyadexpress.com/v2/countries');
        
        return json_decode($countries);
    }


    public function getLabel($tracking_id){
      $label =  Http::withHeaders([
        'Content-Type'=>'application/json',
       
    ])->withToken('ztaMQTcYpWF7XZlXgDWOcdSfNS_w00kD')
    ->get($this->baseUrl."orders/$tracking_id/awb");
    
    return json_decode($label);
    }

    public function cancelOrder($tracking_id){
      $cancel_order =  Http::withHeaders([
        'Content-Type'=>'application/json',
       
    ])->withToken('ztaMQTcYpWF7XZlXgDWOcdSfNS_w00kD')
    ->delete($this->baseUrl."orders/$tracking_id");
    
    return json_decode($cancel_order);
    }
    
}