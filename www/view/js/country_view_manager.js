        fetch('./getcookie-country.php').then((resp) => resp.text()).then(function(data) {
            if(data == ""){
                openSetCountryModal();
                return 0;
            }
            getNews();
        });
    
        function openSetCountryModal(){
            document.querySelector("#countryModal").style.display = "block";
            document.querySelector(".modal-backdrop.fade.show").style.display = "block";
        }
        function setCountry(){
            let country = document.querySelector('#countrySelect').value;
            if(country != ""){
                document.querySelector("#countryModal").style.display = "none";
                document.querySelector(".modal-backdrop.fade.show").remove();
                console.log('seted:',country.value);
                fetch("../setcookie-country.php?country="+country).then(() => {
                    getNews();
                });
            }
            return 0;
        }
        
        function getNews(){
            fetch("./prophet.php").then((resp) => resp.text()).then(function(data) {                
                let elementConverted = new DOMParser().parseFromString(data, 'text/html');
                elementConverted.querySelectorAll('div').forEach((el) => {
                    document.querySelector('.row').appendChild(el)
                });
                document.querySelector('#loading').style.display = "none";
                return 0;                
            })
        }