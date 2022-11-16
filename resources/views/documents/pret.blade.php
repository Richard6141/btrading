<style>
    body {
  background: rgb(204,204,204); 
}
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
.contener{
    margin:5%;
    padding:5%;
}

.intro{
    text-align:justify;
    font: size 14px;
}

.title{
    font-size: 16px;
    font-weight:bold;
    text-decoration: underline
}
.main{
    margin-left:5%;
    padding-top: 5px;
}

.info{
    display:flex;
    flex-direction:row;
    border: 1px solid;
}
.company{
    border: 1px solid;
    width:50%;
    padding:3%
}
.client{
    border: 1px solid;
    width:50%;
    padding:3%
}
.company1{
    width:50%;
    padding:3%
}
.client1{
    width:50%;
    padding:3%
}

.target{
    font-weight:bold;
    text-decoration: underline
}
.target1{
    font-weight:bold;
    border: 1px solid;
}
</style>

<page size="A4">
    <div class="contener">
        <div class="intro">
        <p class="paragrah">
            Considérant que l'emprunteur, Mme ou M…. souhaite emprunter au prêteur, Bank trading, une somme d'argent déterminée;
            Considérant que le prêteur, Bank trading, s'engage à prêter ladite somme d'argent à l'emprunteur, Mme ou M…. dans les conditions et modalités mentionnées ci-dessous; 
            Considérant que les parties souhaitent confirmer leur accord par écrit;
            Considérant que les parties ont la capacité et la qualité d'exercer tous les droits nécessaires à la conclusion et à l'exécution des termes mentionnés dans le présent contrat.
        </p>
        <ol class="main">
            <li class="title">
                <strong>
                IDENTIFICATION COMPLETE DES PARTIES
                </strong>
            </li>
        </ol>
        <p>
            Cet accord est conclu entre:
        </p>
        <div class ="info">
            <div class="company">
                <p class="paragrah">
                    <strong>
                    LENDER
                    </strong>
                    <div>
                        <p> <span class="target">Name:</span> <span>BANK TRADING COMPANY </span> 
                        </p><span class="target"></span>
                        <p><span class="target">Capital:</span> <span>C CORPORATION COMPANY WITH CAPITAL OF 2,400000000 $ US </span>
                        </p>
                        <p><span class="target">HEAD OFFICE:</span> <span>5CALIFORNIE, 915WILSHIRE BLVD #1000,LOS ANGELES, CA 90017, US</span>
                        </p>
                        <p><span class="target">EUROPE CONCTANTS:</span> <span>BRANCH OFFICE/REPRESENTATIVE/AGENT/DELEGATE</span>
                        </p>
                        <p><span class="target">Phone:</span> <span>+ 33 7 55 41 29 94/ +49 1512 4723776</span>
                        </p>
                        <p><span class="target">E-mail:</span><span>contact@btrading.com</span>
                        </p>
                    </div>
                </p>
            </div>
            <div class="client">
                <p class="paragrah">
                    <strong>
                    BORROWER
                    </strong>
                </p>
                <div>
                    <p><span class="target">Nom:</span>
                    </p>
                    <p> <span class="target">Prénom:</span>
                    </p>
                    <p><span class="target">Naissance:</span>
                    </p>
                    <p><span class="target">Numéro ID:</span>
                    </p>
                    <p><span class="target">Ville:</span>
                    </p>
                    <p><span class="target">Adresse:</span>
                    </p>
                    <p><span class="target">Tél: </span><span>32775219 </span>
                    </p>
                    <p><span class="target">E-mail: </span><span>montoveronica22@gmail.com</span>
                    </p>
                </div>
            </div>
        </div>
        <ol class="main" start="2">
            <li class = "title">CARACTERISTIQUES DU PRÊT</li>
        </ol>
        <div class ="info">
            <div class="company1">
                <p class="paragrah">
                    <strong>
                    LENDER
                    </strong>
                    <div>
                        <p> <span class="target">Objet de prêt:</span> 
                        </p><span class="target"></span>
                        <p><span class="target">Montant du prêt:</span> 
                        </p>
                        <p><span class="target">Durée de remboursement:</span> 
                        </p>
                        <p><span class="target">Mensualité:</span> 
                        </p>
                        <p><span class="target">Date du premier remboursement :</span> 
                        </p>
                        <p><span class="target">Taux de remboursement :</span>
                        </p>
                    </div>
                </p>
            </div>
            <div class="client1">
                <p class="paragrah">
                </p>
                <div>
                    <p><span class="target1">Immobilier</span>
                    </p>
                    <p> <span class="target1">5000000</span>
                    </p>
                    <p><span class="target1">50 mois</span>
                    </p>
                    <p><span class="target1">510 €</span>
                    </p>
                    <p><span class="target1">05/10/2023</span>
                    </p>
                    <p><span class="target1">3%</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    
</page>
<page size="A4"></page>
<!-- <page size="A4" layout="landscape"></page>
<page size="A5"></page>
<page size="A5" layout="landscape"></page>
<page size="A3"></page>
<page size="A3" layout="landscape"></page> -->