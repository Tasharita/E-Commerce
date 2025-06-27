const cart = JSON.parse(localStorage.getItem("cart")) || [];
    function renderCart(){
         const container = document.getElementById("cart-container");

    if (cart.length === 0) {
      container.innerHTML = "<p>Your cart is empty.</p>";
    } else {
      cart.forEach((item,index) => {
        const total = item.quantity * item.price;
        container.innerHTML += `
          <div class="card" style="width: 18rem;">
            <div class="image-container"><img src="${item.image}" alt="${item.name}"/></div>
            <div class="card-body">
              <h5>${item.name}</h5>
              <p>Quantity: ${item.quantity}</p>
              <p>Price: ${item.price} Ksh</p>
              <p><strong>Total: ${total} Ksh</strong></p>
              <button onclick="increaseQty('${index}')" class="add">+</button> 
              <button onclick="decreaseQty('${index}')" class="subtract">-</button>
            </div>
          </div>
        `;
      });
    }
    }

    function increaseQty(index) {
    cart[index].quantity += 1;
     const container = document.getElementById("cart-container");
     container.innerHTML='';
    updateCart();
  }

  function decreaseQty(index) {
    if (cart[index].quantity > 1) {
      cart[index].quantity -= 1;
    } else {
      cart.splice(index, 1); // remove item if quantity goes to 0
    }
    const container = document.getElementById("cart-container");
     container.innerHTML='';
    updateCart();
  }

  function updateCart() {
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
  }

  window.onload=renderCart()
   


    