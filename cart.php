<?php
    require_once "product.php";
    require_once "medicine.php";

    class Cart extends Medicine{
        private $cart = array();

        function addToCart($cartItems){
            $this->cart[] = $cartItems;
        }
        function viewCart(){
            $arrCart = $this->cart;
            foreach ($arrCart as $key => $value) {
                echo
                '
                <ul>
                    <li><b>Name: </b>' . $value->getName() . '</li>
                    <li><b>Description: </b>'. $value->getDescription() .'</li>
                    <li><b>Price: ₱ </b>'. number_format($value->getPrice(), 2) .'</li>
                    <li><b>Dose: </b>'. $value->getDose() .' mg.</li>
                    <li><b>Type: </b>'. $value->getType() .'</li>
                    <li><b>Exp Date: </b>'. $value->getExpirationDate() .'</li>
                    <li><b>SRP: ₱ </b>'. number_format($value->computeSRP(), 2) .'</li>
                </ul><hr>
                ';
            }
        }

        function computeTotal(){
            $total = 0;
            foreach($this->cart as $key => $value){
                $total += $value->computeSRP();
            }
            echo '<b>Total Cart Ammount: ₱ </b>'. number_format($total, 2) .'';
        }
    }

?>