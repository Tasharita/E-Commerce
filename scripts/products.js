const container=document.querySelector('.single-product')
const product=localStorage.getItem("singleproduct")
const searchInput=document.getElementById('Search-bar')
const searchButton=document.querySelector ('.search')
const overlay=document.getElementById('overlay')
const product1=JSON.parse(product)
container.innerHTML=`
    <div>
        <div class="card" style="width: 50rem;">
            <div class="large">
                <img src="${product1.image}">
            </div>
            <h2>${product1.title}</h2>
            <h3>${product1.price*100} Ksh</h3>
            <p>${product1.description}</p>
            <button class="btn btn-primary" onclick="addToCart('${product1.title}','${product1.price*100}','${product1.image}')">Add to Cart
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
            </svg>
            </button>
            

        </div>

    </div>`



console.log(product1)

//search functionality
const searchItem=async(search)=>{
     const response=await fetch('https://fakestoreapi.com/products')
    const data=await response.json()
    console.log(data)

    showcasecontainer.innerHTML='';

    data.forEach((product)=>{
        if(product.title.toLowerCase().includes(search.toLowerCase())){
        const card=document.createElement('div');
        card.innerHTML=`
            <div>
                <div class="card" style="width: 18rem;">
                <div class="image-container"><img src="${product.image}" class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title">${product.title}</h5>
                        <p class="card-text">${product.price*100} Ksh</p>
                        <p class="product-rating">Customers have rated this: ${product.rating.rate}/5
                        <button  onclick="fetchSingle(${product.id})" class="btn btn-primary">View Product</button>
                        
                    </div>
                </div>
            </div>`;
        showcasecontainer.appendChild(card);
    };
    });
};

searchButton.addEventListener('click', () => {
  const searchProduct = searchInput.value;
  searchItem(searchProduct);
});

//show overlay when typing
searchInput.addEventListener('focus',()=>{
    overlay.style.display='block';
});

searchInput.addEventListener('blur',()=>{
    overlay.style.display='none'
})

//hide overlay when you scroll
window.addEventListener('scroll', () => {
  overlay.style.display = 'none';
});

//add to cart
function addToCart(pname, price, image) {
  fetch('add_to_cart.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: `name=${encodeURIComponent(pname)}&price=${price}&image=${encodeURIComponent(image)}`
  }).then(() => {
    window.location.assign('cart.php');
  });
}