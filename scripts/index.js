const showcasecontainer=document.querySelector('.showcasecontainer')
const singleproduct=document.querySelector('.single-product')

const fetchProducts=async()=>{
    const response=await fetch('https://fakestoreapi.com/products')
    const data=await response.json()
    console.log(data)
    data.forEach((product) => {
        const card=document.createElement('div')
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