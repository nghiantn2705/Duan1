function LocalStorageService() {
  return {
      get(itemName) {
          const item = localStorage.getItem(itemName);
          // const numPatt = new RegExp(/^\d+$/);
          // const jsonPatt = new RegExp(/[\[\{].*[\}\]]/);
          if (item) {
              return JSON.parse(item)
          }
          else {
              return null;
          }
      },

      set(itemName, item) {
          if (typeof item === "object") {
              localStorage.setItem(itemName, JSON.stringify(item));
          } else {
              localStorage.setItem(itemName, item);
          }
      },

      remove(itemName) {
          localStorage.removeItem(itemName);
      }
  }

}

var localStorageService = LocalStorageService()

$(document).ready(function () {
  $(document).scroll(function () {
    const header = document.querySelector(".header");
    if (window.scrollY > 20) {
      header.classList.add("header-active");
    } else {
      header.classList.remove("header-active");
    }
  });
  $("#nav-item-user").click(function () {
    const loginuser = document.querySelector(".login-user");
    loginuser.style.display = "flex";
    const backdrop = document.querySelector(".backdrop");
    backdrop.style.display = "block";
  })
  
  $("#close").click(function () {
    const loginuser = document.querySelector(".login-user");
    loginuser.style.display = "none";
    const backdrop = document.querySelector(".backdrop");
    backdrop.style.display = "none";
  })
  $("btn-collapse").click(function () {
    const collapse1 = document.querySelector(".collapse-show");
    if(collapse1.style.height === '1000.38px'){
      collapse1.style.height = '100%';
    }else{
      collapse1.style.height === '1000.38px';
    }
  })


  var swiper = new Swiper(".mySwiper", {
    loop: true,
        loopFillGroupWithBlank: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 3,
        spaceBetween: 50,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 3,
        spaceBetween: 50,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
      },
      // when window width is >= 640px
      1024: {
        slidesPerView: 4,
        spaceBetween: 50,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
      }
    },
  });

  var swiper1 = new Swiper(".mySwiper1", {
  
    autoplay: {
      delay: 6000,
      disableOnInteraction: false,
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 3,
        spaceBetween: 50,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 3,
        spaceBetween: 50,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
      },
      // when window width is >= 640px
      1024: {
        slidesPerView: 4,
        spaceBetween: 50,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
      }
    },
  });

  //Cart
    $(".add-value").click(function () {
      getElementsByClassName(".value-product").value = getElementsByClassName(".value-product").value + 1
    console.log(valueProduct)
    })
    //Add Cart
    const btnoder = document.querySelectorAll(".product-btn-cart");
    btnoder.forEach(function (button, index) {
      button.addEventListener("click", function (event) {
        var btnitem = event.target
        var product = btnitem.parentElement
        var productImage = product.querySelector("img").src
        var productName = product.querySelector(".product-name").innerText
        var productPrice = product.querySelector("span").innerText
        // console.log(productName,productimage,productPrice)
        var productObj = {productName, productImage, productPrice}
        var productCart = localStorageService.get("ProductCart")
        console.log(productCart);
        if(productCart) {
          productCart.push(productObj)
          localStorageService.set("ProductCart", productCart)
        } else {
          localStorageService.set("ProductCart", [productObj])
        }
        // addcart(productObj)
      })
    })

    function addcart(productName, productimage, productPrice) {
      // var addtr = document.createElement("div")
      // var trcontent = '<div class="cart-product"><img src="' + productimage + '" alt="..."><div id="item-product"><div class="cart-name-product"><p class="">' + productName + '</p></div><div class="box-cart"><div class="value-cart"><label for="">Số lượng</label><div class="value-box"><input type="number" class="value-product" value="1" min="1" ></div></div><div class="all-price-product"><p class="">Giá: <span>' + productPrice + '</span>đ</p></div><div class="trash"><i class="fa-solid fa-trash"></i></div></div></div></div> '
      // addtr.innerHTML = trcontent
      // var carttable = document.querySelector(".cart-product-all");
      // carttable.append(addtr)
      // carttotal();
      // DeleteProduct()
    }

    function renderCart() {
      var carttable = document.querySelector(".cart-product-all");
      // Lay du lieu ra
      var productCart = localStorageService.get("ProductCart")
      console.log(productCart);
      var content = ""
      productCart && productCart.forEach(function(product) {
        // Template string + string interpolation
        content = content + `
        <div class="cart-product">
                <img src="${product.productImage}" alt="...">
                <div id="item-product">
                  <div class="cart-name-product">
                  <p class="">${product.productName}</p>
                </div>
                <div class="box-cart">
                  <div class="value-cart">
                    <label for="">Số lượng</label>
                    <div class="value-box">
                      <input type="number" class="value-product" value="1" min="1"  readonly>
                    </div>
                  </div>
                  <div class="all-price-product">
                    <p class="">Giá: <span>${product.productPrice}</span>đ</p>
                  </div>
                  <div class="trash">
                    <i class="fa-solid fa-trash"></i>
                  </div>
                </div>
              </div>
            </div> 
        `
      })
      carttable.innerHTML = content;
      console.log(content);
    }
    //End Add Cart
    //Total Cart
    function carttotal() {
      var cartItem = document.querySelectorAll(".cart-product")
      var totalAllC = 0
      var totalproduct = document.querySelector(".total-product")
      var contentTotalProduct = cartItem.length
      totalproduct.innerHTML = contentTotalProduct
      for (var i = 0; i < cartItem.length; i++) {
        var inputValue = cartItem[i].querySelector(".value-product").value;
        var PriceProduct = cartItem[i].querySelector(".all-price-product span").innerHTML;
        totalAll = inputValue * PriceProduct;
        totalAllC = totalAllC + totalAll
      }
      var carttotal = document.querySelector(".money")
      carttotal.innerHTML = totalAllC
      changeInput()
    }
    //EndTotal Cart
    //Delete Product
    function DeleteProduct() {
      var cartItem = document.querySelectorAll(".cart-product")
      for (var i = 0; i < cartItem.length; i++) {
        var DeleteProduct = document.querySelectorAll(".trash")
        DeleteProduct[i].addEventListener("click", function (event) {
          var cartDelete = event.target
          var DeleteItem = cartDelete.parentElement.parentElement.parentElement.parentElement
          DeleteItem.remove();
          carttotal()
        })
      }
    }
    //EndDelete Product
    //changeInput
    function changeInput() {
      var cartItem = document.querySelectorAll(".cart-product")
      for (var i = 0; i < cartItem.length; i++) {
        var inputValue = cartItem[i].querySelector(".value-product")
        inputValue.addEventListener("change",function(){
          carttotal()
        })
      }
    }
    //changeInput
  //EndCart
});