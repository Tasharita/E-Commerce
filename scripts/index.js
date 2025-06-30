const showcasecontainer=document.querySelector('.showcasecontainer')
const singleproduct=document.querySelector('.single-product')
const searchInput=document.getElementById('Search-bar')
const searchButton=document.querySelector ('.search')
const overlay=document.getElementById('overlay')
const category=document.getElementById('cat')
const category2=document.getElementById('cat2')


const fetchProducts=async()=>{
    const response=await fetch('https://fakestoreapi.com/products')
    const data=await response.json()
    console.log(data)
    data.forEach((product) => {
        const card=document.createElement('div')
        card.innerHTML=`
            <div>
                <div class="card" style="width: 18rem; height:600px">
                <div class="image-container"><img src="${product.image}" class="card-img-top" alt="..."></div>
                    <div class="card-body">
                        <h5 class="card-title">${product.title}</h5>
                        <p class="card-text">${product.price*100} Ksh</p>
                        <p class="product-rating">Customers have rated this: ${product.rating.rate}/5
                        <button  onclick="fetchSingle(${product.id})" class="btn btn-primary">View Product</button>
                        
                    </div>
                </div>
            </div>`
        showcasecontainer.appendChild(card)
        
    });

}

fetchProducts()

const fetchSingle= async(id)=>{
    const response= await fetch(`https://fakestoreapi.com/products/${id}`)
    const data=await response.json()
    console.log(data)
    window.location.assign('./product.html')

    localStorage.setItem('singleproduct',JSON.stringify(data))

}

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

//category-search
const categoryClick=async(category)=>{
     const response=await fetch('https://fakestoreapi.com/products')
    const data=await response.json()
    console.log(data)

    showcasecontainer.innerHTML='';

    data.forEach((product)=>{
        if(product.category.toLowerCase().includes(category.toLowerCase())){
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

category.addEventListener('click',()=>{
    const catProduct=category.value;
    categoryClick(catProduct);
})

