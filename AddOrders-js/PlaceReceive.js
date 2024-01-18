$(document).ready(function() {
    var placeclass = document.querySelector('#placeOrderBtn');
    var receiveclass = document.querySelector('#receiveOrderBtn');
    var order_type = document.getElementsByClassName('order_type');
    var order_label = document.getElementById('order-label');
            // Show Place Order Form and hide Receive Order Form initially
            $("#placeOrderBtn").on("click", function() {
                $("#placeOrderForm").css("display", "block");
                $("#receiveOrderForm").css("display", "none");
                placeclass.classList.add('active');
                receiveclass.classList.remove('active');
            });

            // Show Receive Order Form and hide Place Order Form when clicking the Receive Order button
            $("#receiveOrderBtn").on("click", function() {
                $("#placeOrderForm").css("display", "none");
                $("#receiveOrderForm").css("display", "block");
                receiveclass.classList.add('active');
                placeclass.classList.remove('active');
            });
        });