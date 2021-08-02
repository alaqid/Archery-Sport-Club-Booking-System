function mycalculate(event) {
    var level = document.getElementById("level").value;
    
    var price = 30;
  
    if (level == "Non-Member"){
      var disc = (30*1);
      price += "<br>MEMBERSHIP DISCOUNT : FREE NO DISCOUNT"; 
      price += "<br><br><hr><br>"; 
      price += "TOTAL PRICE : RM" + disc;
      display.innerHTML = "PRICE: RM " + price; 
  
    }else if (level == "SILVER"){
      var disc = (30*0.85);
      price += "<br>MEMBERSHIP DISCOUNT : SILVER -15%"; 
      price += "<br><br><hr><br>"; 
      price += "TOTAL PRICE : RM" + disc;
      display.innerHTML = "PRICE: RM " + price; 
  
    }else if (level == "GOLD"){
        var disc = (30*0.8);
      price += "<br>MEMBERSHIP DISCOUNT : GOLD -20%"; 
      price += "<br><br><hr><br>"; 
      price += "TOTAL PRICE : RM" + disc;
      display.innerHTML = "PRICE: RM " + price; 
  
    }else {
      alert("Error. Please Enter A Value");
    }
  
  }

  