
const changepic = () =>{
    document.body.style.backgroundImage = `url(wallpapers/w\\ \\ \\(${Math.floor(Math.random() * 81)}\\).jpg)`;
}
window.addEventListener("load",changepic);
let cars ={

    'AUDI':['80','A1','A2','A3','A4','A5','A6','A7','A8','Q3','Q5','Q8'],
    
    'BMW':['Serie 1','Serie 2','Serie 3','Serie 4','Serie 5','Serie 6','Serie 7','M2','M3','M4','M5','M8','X1','X2','X3','X4','X5'],

    'CHEVROLET':['Aveo','Cruze','Optra','Spark'],

    'Citroën':['Berlingo','C1','C2','C3','C4','C5','C-Elysee','C15','Jumpy','Nemo','Saxo'],

    'Dacia':['Duster','Logan','Sandero'],

    'FIAT':['Doblo','Ducato','Palio','Panda','Punto','Grande Punto','500','uno'],

    'FORD':['Fiesta','Focus','Ranger','Transit'],

    'Hyundai':['Accent','i10','i20','grand i10'],

    'Isuzu':['D-max','Faster','super faster','Nkr','Npr'],

    'KIA':['Cerato','Picanto','Rio','Sportage'],

    'Mazda':['2','3','BT-50','B2500','B2900'],

    'Mercedes-Benz':['190','250','Classe A','Classe B','Classe C','Classe E','Vito'],

    'Mitsubishi':['Mirage','L200','Pajero'],

    'Nissan':['Altima','juke','Micra','Navara','Patrol','Qashqai'],

    'OPEL':['Astra H','ASTRA G','Corsa B','Corsa C','Corsa D','Vectra','Combo','Kadett'],

    'PEUGEOT':['106','205','206','206+','207','208','301','306','307','308','405','406','407','Expert','Partner','Landtrek'],

    'PORSCHE':['Cayenne'],

    'RENAULT':['19','Clio','Clio Classique','Kangoo','Laguna','Logan','Megane','R5','R21','Symbole','Super 5'],

    'Seat':['Ibiza','Leon'],

    'Skoda':['Fabia','Octavia'],

    'Toyota':['Agya','Camry','Corolla','Hilux','LandCruiser','Rav4','Yaris'],

    'Volkswagen':['Amarok','Bora','Caddy','Golf ','Jetta','Passat','Passat CC','Polo','Tiguan','Touareg','Touran','Vento'],

    'Mini':['Cooper']
}


let marque = Object.keys(cars)
let slc=document.getElementById('slc');
for(let i =0;i<marque.length;i++){
    let option = document.createElement("option");
    option.text = marque[i];
    option.value= marque[i];
    slc.add(option);
}
let slc2=document.getElementById('slc2');

function selc2(){
    let nwslc=slc.value;
    let mods=cars[nwslc]
    console.log(mods)
    mods.forEach((elem) => {
        let option = document.createElement("option");
        option.text = elem;
        option.value = elem;
        slc2.add(option);
    })
    console.log(slc2)
}
function cleanl(){
    if(slc.selectedIndex!=0){
        while(slc2.length>1)
        slc2.remove(1)
    }
}
