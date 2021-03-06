var _curArray = [["USD","US Dollar"],["EUR","Euro"],["GBP","British Pound"],["INR","Indian Rupee"],["AUD","Australian Dollar"],["CAD","Canadian Dollar"],["SGD","Singapore Dollar"],["CHF","Swiss Franc"],["MYR","Malaysian Ringgit"],["JPY","Japanese Yen"],["CNY","Chinese Yuan Renminbi"],["NZD","New Zealand Dollar"],["THB","Thai Baht"],["HUF","Hungarian Forint"],["AED","Emirati Dirham"],["HKD","Hong Kong Dollar"],["MXN","Mexican Peso"],["ZAR","South African Rand"],["PHP","Philippine Peso"],["SEK","Swedish Krona"],["IDR","Indonesian Rupiah"],["SAR","Saudi Arabian Riyal"],["BRL","Brazilian Real"],["TRY","Turkish Lira"],["KES","Kenyan Shilling"],["KRW","South Korean Won"],["EGP","Egyptian Pound"],["IQD","Iraqi Dinar"],["NOK","Norwegian Krone"],["KWD","Kuwaiti Dinar"],["RUB","Russian Ruble"],["DKK","Danish Krone"],["PKR","Pakistani Rupee"],["ILS","Israeli Shekel"],["PLN","Polish Zloty"],["QAR","Qatari Riyal"],["XAU","Gold Ounce"],["OMR","Omani Rial"],["COP","Colombian Peso"],["CLP","Chilean Peso"],["TWD","Taiwan New Dollar"],["ARS","Argentine Peso"],["CZK","Czech Koruna"],["VND","Vietnamese Dong"],["MAD","Moroccan Dirham"],["JOD","Jordanian Dinar"],["BHD","Bahraini Dinar"],["XOF","CFA Franc"],["LKR","Sri Lankan Rupee"],["UAH","Ukrainian Hryvnia"],["NGN","Nigerian Naira"],["TND","Tunisian Dinar"],["UGX","Ugandan Shilling"],["RON","Romanian Leu"],["BDT","Bangladeshi Taka"],["PEN","Peruvian Sol"],["GEL","Georgian Lari"],["XAF","Central African CFA Franc BEAC"],["FJD","Fijian Dollar"],["VEF","Venezuelan Bol&#237;var"],["BYN","Belarusian Ruble"],["HRK","Croatian Kuna"],["UZS","Uzbekistani Som"],["BGN","Bulgarian Lev"],["DZD","Algerian Dinar"],["IRR","Iranian Rial"],["DOP","Dominican Peso"],["ISK","Icelandic Krona"],["XAG","Silver Ounce"],["CRC","Costa Rican Colon"],["SYP","Syrian Pound"],["LYD","Libyan Dinar"],["JMD","Jamaican Dollar"],["MUR","Mauritian Rupee"],["GHS","Ghanaian Cedi"],["AOA","Angolan Kwanza"],["UYU","Uruguayan Peso"],["AFN","Afghan Afghani"],["LBP","Lebanese Pound"],["XPF","CFP Franc"],["TTD","Trinidadian Dollar"],["TZS","Tanzanian Shilling"],["ALL","Albanian Lek"],["XCD","East Caribbean Dollar"],["GTQ","Guatemalan Quetzal"],["NPR","Nepalese Rupee"],["BOB","Bolivian Bol&#237;viano"],["ZWD","Zimbabwean Dollar"],["BBD","Barbadian or Bajan Dollar"],["CUC","Cuban Convertible Peso"],["LAK","Lao Kip"],["BND","Bruneian Dollar"],["BWP","Botswana Pula"],["HNL","Honduran Lempira"],["PYG","Paraguayan Guarani"],["ETB","Ethiopian Birr"],["NAD","Namibian Dollar"],["PGK","Papua New Guinean Kina"],["SDG","Sudanese Pound"],["MOP","Macau Pataca"],["NIO","Nicaraguan Cordoba"],["BMD","Bermudian Dollar"],["KZT","Kazakhstani Tenge"],["PAB","Panamanian Balboa"],["BAM","Bosnian Convertible Marka"],["GYD","Guyanese Dollar"],["YER","Yemeni Rial"],["MGA","Malagasy Ariary"],["KYD","Caymanian Dollar"],["MZN","Mozambican Metical"],["RSD","Serbian Dinar"],["SCR","Seychellois Rupee"],["AMD","Armenian Dram"],["SBD","Solomon Islander Dollar"],["AZN","Azerbaijan Manat"],["SLL","Sierra Leonean Leone"],["TOP","Tongan Pa&#039;anga"],["BZD","Belizean Dollar"],["MWK","Malawian Kwacha"],["GMD","Gambian Dalasi"],["BIF","Burundian Franc"],["SOS","Somali Shilling"],["HTG","Haitian Gourde"],["GNF","Guinean Franc"],["MVR","Maldivian Rufiyaa"],["MNT","Mongolian Tughrik"],["CDF","Congolese Franc"],["STD","Sao Tomean Dobra"],["TJS","Tajikistani Somoni"],["KPW","North Korean Won"],["MMK","Burmese Kyat"],["LSL","Basotho Loti"],["LRD","Liberian Dollar"],["KGS","Kyrgyzstani Som"],["GIP","Gibraltar Pound"],["XPT","Platinum Ounce"],["MDL","Moldovan Leu"],["CUP","Cuban Peso"],["KHR","Cambodian Riel"],["MKD","Macedonian Denar"],["VUV","Ni-Vanuatu Vatu"],["MRO","Mauritanian Ouguiya"],["ANG","Dutch Guilder"],["SZL","Swazi Lilangeni"],["CVE","Cape Verdean Escudo"],["SRD","Surinamese Dollar"],["XPD","Palladium Ounce"],["SVC","Salvadoran Colon"],["BSD","Bahamian Dollar"],["XDR","IMF Special Drawing Rights"],["RWF","Rwandan Franc"],["AWG","Aruban or Dutch Guilder"],["DJF","Djiboutian Franc"],["BTN","Bhutanese Ngultrum"],["KMF","Comorian Franc"],["WST","Samoan Tala"],["SPL","Seborgan Luigino"],["ERN","Eritrean Nakfa"],["FKP","Falkland Island Pound"],["SHP","Saint Helenian Pound"],["JEP","Jersey Pound"],["TMT","Turkmenistani Manat"],["TVD","Tuvaluan Dollar"],["IMP","Isle of Man Pound"],["GGP","Guernsey Pound"],["ZMW","Zambian Kwacha"],["XBT","Bitcoin"]];
var ar = []; 
for(var i=0;i<_curArray.length;i++){ 
    ar.push(_curArray[i][0]+", "+_curArray[i][1])
};
                
whenDocumentReadyDo(function(){
    console.log(ar);
    var input = document.querySelector('input[name="default_currency"]');
    if(input === null || typeof input === 'undefined'){
        return;
    }
    new autoComplete({
        selector: input,
        minChars: 2,
        source: function(term, suggest){
            term = term.toLowerCase();
            var choices = ar;
            var matches = [];
            for (i=0; i<choices.length; i++)
                if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
                
            suggest(matches);
        },
        renderItem: function (_item, search){
            search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
            var re = new RegExp("(" + search.split(',').join('|') + ")", "gi");
            var item = _item.split(",");
            console.log(item)
            return '<div class="autocomplete-suggestion" data-currency-code="'+item[0]+'" data-currency-name="'+item[1]+'" data-val="'+item[0]+'">'
                    +_item.replace(re, "<b>$1</b>")
                    +'</div>';
        },
        onSelect: function(e, term, item){
            console.log('Currency Code "'
                +item.getAttribute('data-currency-code')
                +'" selected by '
                +(e.type == 'keydown' ? 'pressing enter' : 'mouse click')+'.');
    }
    });
})                




