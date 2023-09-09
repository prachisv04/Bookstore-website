//function to delete specified element from array 
function arrayRemove(arr, value) {
      
    return arr.filter(function (ele) {
        return ele != value;
    });

  }

 // filter by category 
let categoryfilter = document.getElementsByName("catlist");
let categorylist = [];

for(let i =0;i< categoryfilter.length;i++){
  categoryfilter[i].addEventListener("change",()=>{
      if (categoryfilter[i].checked == true){
        categorylist.push(categoryfilter[i].value);
      } 
      else {
        categorylist= arrayRemove(categorylist,categoryfilter[i].value);
      }
  });
}

// filter by language
let languagefilter = document.getElementsByName("langlist");
let languagelist = [];
for(let i =0;i< languagefilter.length;i++){
  languagefilter[i].addEventListener("change",()=>{
      if (languagefilter[i].checked == true){
        languagelist.push(languagefilter[i].value);
      } 
      else {
        languagelist= arrayRemove(languagelist,languagefilter[i].value);
      }
  });
}

// filter by author

let authorfilter = document.getElementsByName("authlist");
let authorlist = [];
for(let i =0;i< authorfilter.length;i++){

  authorfilter[i].addEventListener("change",()=>{
      if (authorfilter[i].checked == true){
        authorlist.push(authorfilter[i].value);
      } 
      else {
        authorlist =  arrayRemove(authorlist,authorfilter[i].value);
      }
  });
}


// filter by price
let pricefilter = document.getElementsByName("pricelist");
let pricelist = [];
for(let i =0;i< pricefilter.length;i++){

  pricefilter[i].addEventListener("change",()=>{
      if (pricefilter[i].checked == true){
        pricelist.push(pricefilter[i].value);
      } 
      else {
        pricelist =  arrayRemove(pricelist,pricefilter[i].value);
      }         
  });
}

// filter by rate
let ratefilter = document.getElementsByName("ratelist");
let ratelist= [];
for(let i =0;i< ratefilter.length;i++){

  ratefilter[i].addEventListener("change",()=>{
      if (ratefilter[i].checked == true){
        ratelist.push(ratefilter[i].value);
      } 
      else {
        ratelist =  arrayRemove(ratelist,ratefilter[i].value);
      }
  });
}


let catlist_str; 
let langlist_str;  
let authlist_str;
let pricelist_str;
let ratelist_str;
let apply = document.getElementsByClassName("apply-filter");
for(let itr=0;itr<2;itr++){

apply[itr].addEventListener("click",()=>{
  

  if(categorylist.length == 0 ){
    console.log("categorylist is empty");
     catlist_str = undefined;
  }
  else{
     catlist_str = categorylist.join(",");
  }
  
  if(pricelist.length == 0 ){
    console.log("pricelist is empty");
     pricelist_str = undefined;
  }
  else{
     pricelist_str = pricelist.join(",");
  }


  if(ratelist.length == 0 ){
    console.log("ratelist is empty");
    ratelist_str = undefined;
  }
  else{
    ratelist_str = ratelist.join(",");
  }

  if(languagelist.length == 0 ){
    console.log("languagelist is empty");
      langlist_str = undefined;
  }
  else{
      langlist_str = languagelist.join(",");
  }
  
  if(authorlist.length == 0 ){
    console.log("authorlist is empty");
     authlist_str = undefined;
  }
  else{
     authlist_str = authorlist.join(",");
  }

  document.getElementById("closefilterbutton").click();

$.ajax({
       url: 'http://localhost/Bookstore/filter.php',
       type: 'POST',
        data: {
          extra :1,
          sortmethod: sortingby,
          categorylistdata: catlist_str,
          languagelistdata: langlist_str,
          authorlistdata: authlist_str,
          pricelistdata: pricelist_str,
          ratelistdata: ratelist_str
        },
        success: function(response){
          $('#allProducts').html(response);
        }
});
});
}

let clear = document.getElementsByClassName("clearAll");
for(let itr=0;itr<2;itr++){
clear[itr].addEventListener("click",()=>{
 categorylist=[]
  pricelist = []
  authorlist = []
  ratelist = []
  languagelist = []
  $('input[type=checkbox]').prop('checked',false); 
  
});
}

// sorting

// on mobile
let sorts = document.getElementsByName("sortoption");
let sortingby ;
for(let itr = 0;itr<sorts.length;itr++){
    sorts[itr].addEventListener("change",()=>{
        sortingby = sorts[itr].value;
       document.getElementById("closesortbutton").click();

        
    $.ajax({
        url: 'http://localhost/Bookstore/filter.php',
        type: 'POST',
        data: {
        extra :1,
        sortmethod: sortingby,
        categorylistdata: catlist_str,
        languagelistdata: langlist_str,
        authorlistdata: authlist_str,
        pricelistdata: pricelist_str,
        ratelistdata: ratelist_str
        },
        success: function(response){
        $('#allProducts').html(response);
        }
});


    });
}

// on laptop

document.getElementById("sortMethod").addEventListener("change",()=>{
    sortingby = document.getElementById("sortMethod").value;
    $.ajax({
        url: 'http://localhost/Bookstore/filter.php',
        type: 'POST',
        data: {
        extra :1,
        sortmethod: sortingby,
        categorylistdata: catlist_str,
        languagelistdata: langlist_str,
        authorlistdata: authlist_str,
        pricelistdata: pricelist_str,
        ratelistdata: ratelist_str
        },
        success: function(response){
        $('#allProducts').html(response);
        }
});
});


