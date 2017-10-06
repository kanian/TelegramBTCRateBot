<div class="form-group {{ $errors->has('default_urrency') ? 'has-error' : ''}}">
    {!! Form::label('default_currency', 'Default Currency', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('default_currency', null, ['type'=>'search', 'class' => 'form-control typeahead-currency', 'autocomplete'=>'off']) !!}
        {!! $errors->first('default_currency', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telegram_user_name') ? 'has-error' : ''}}">
    {!! Form::label('telegram_user_name', 'Telegram Username', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6" >
        {!! Form::text('telegram_user_name', null, ['class' => 'form-control', 'placeholder'=>"Enter your_telegram_username here"]) !!}
        {!! $errors->first('telegram_user_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telegram_user_id') ? 'has-error' : ''}}">
    {!! Form::label('telegram_user_id', 'Telegram User ID', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6" >
        {!! Form::text('telegram_user_id', null, ['class' => 'form-control', 'placeholder'=>"Send /start command and I will collect User Id for you", 'disabled'=>'disabled']) !!}
        {!! $errors->first('telegram_user_id', '<p class="help-block">:message</p>') !!}
        
    </div>
    <span data-toggle="tooltip" title="Hooray!"  class="glyphicon glyphicon-info-sign"></span>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Save', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


<script>

/*$(function() {
                $(document).ready(function(){
                console.log('ok');
                var _curArray = [["USD","US Dollar"],["EUR","Euro"],["GBP","British Pound"],["INR","Indian Rupee"],["AUD","Australian Dollar"],["CAD","Canadian Dollar"],["SGD","Singapore Dollar"],["CHF","Swiss Franc"],["MYR","Malaysian Ringgit"],["JPY","Japanese Yen"],["CNY","Chinese Yuan Renminbi"],["NZD","New Zealand Dollar"],["THB","Thai Baht"],["HUF","Hungarian Forint"],["AED","Emirati Dirham"],["HKD","Hong Kong Dollar"],["MXN","Mexican Peso"],["ZAR","South African Rand"],["PHP","Philippine Peso"],["SEK","Swedish Krona"],["IDR","Indonesian Rupiah"],["SAR","Saudi Arabian Riyal"],["BRL","Brazilian Real"],["TRY","Turkish Lira"],["KES","Kenyan Shilling"],["KRW","South Korean Won"],["EGP","Egyptian Pound"],["IQD","Iraqi Dinar"],["NOK","Norwegian Krone"],["KWD","Kuwaiti Dinar"],["RUB","Russian Ruble"],["DKK","Danish Krone"],["PKR","Pakistani Rupee"],["ILS","Israeli Shekel"],["PLN","Polish Zloty"],["QAR","Qatari Riyal"],["XAU","Gold Ounce"],["OMR","Omani Rial"],["COP","Colombian Peso"],["CLP","Chilean Peso"],["TWD","Taiwan New Dollar"],["ARS","Argentine Peso"],["CZK","Czech Koruna"],["VND","Vietnamese Dong"],["MAD","Moroccan Dirham"],["JOD","Jordanian Dinar"],["BHD","Bahraini Dinar"],["XOF","CFA Franc"],["LKR","Sri Lankan Rupee"],["UAH","Ukrainian Hryvnia"],["NGN","Nigerian Naira"],["TND","Tunisian Dinar"],["UGX","Ugandan Shilling"],["RON","Romanian Leu"],["BDT","Bangladeshi Taka"],["PEN","Peruvian Sol"],["GEL","Georgian Lari"],["XAF","Central African CFA Franc BEAC"],["FJD","Fijian Dollar"],["VEF","Venezuelan Bol&#237;var"],["BYN","Belarusian Ruble"],["HRK","Croatian Kuna"],["UZS","Uzbekistani Som"],["BGN","Bulgarian Lev"],["DZD","Algerian Dinar"],["IRR","Iranian Rial"],["DOP","Dominican Peso"],["ISK","Icelandic Krona"],["XAG","Silver Ounce"],["CRC","Costa Rican Colon"],["SYP","Syrian Pound"],["LYD","Libyan Dinar"],["JMD","Jamaican Dollar"],["MUR","Mauritian Rupee"],["GHS","Ghanaian Cedi"],["AOA","Angolan Kwanza"],["UYU","Uruguayan Peso"],["AFN","Afghan Afghani"],["LBP","Lebanese Pound"],["XPF","CFP Franc"],["TTD","Trinidadian Dollar"],["TZS","Tanzanian Shilling"],["ALL","Albanian Lek"],["XCD","East Caribbean Dollar"],["GTQ","Guatemalan Quetzal"],["NPR","Nepalese Rupee"],["BOB","Bolivian Bol&#237;viano"],["ZWD","Zimbabwean Dollar"],["BBD","Barbadian or Bajan Dollar"],["CUC","Cuban Convertible Peso"],["LAK","Lao Kip"],["BND","Bruneian Dollar"],["BWP","Botswana Pula"],["HNL","Honduran Lempira"],["PYG","Paraguayan Guarani"],["ETB","Ethiopian Birr"],["NAD","Namibian Dollar"],["PGK","Papua New Guinean Kina"],["SDG","Sudanese Pound"],["MOP","Macau Pataca"],["NIO","Nicaraguan Cordoba"],["BMD","Bermudian Dollar"],["KZT","Kazakhstani Tenge"],["PAB","Panamanian Balboa"],["BAM","Bosnian Convertible Marka"],["GYD","Guyanese Dollar"],["YER","Yemeni Rial"],["MGA","Malagasy Ariary"],["KYD","Caymanian Dollar"],["MZN","Mozambican Metical"],["RSD","Serbian Dinar"],["SCR","Seychellois Rupee"],["AMD","Armenian Dram"],["SBD","Solomon Islander Dollar"],["AZN","Azerbaijan Manat"],["SLL","Sierra Leonean Leone"],["TOP","Tongan Pa&#039;anga"],["BZD","Belizean Dollar"],["MWK","Malawian Kwacha"],["GMD","Gambian Dalasi"],["BIF","Burundian Franc"],["SOS","Somali Shilling"],["HTG","Haitian Gourde"],["GNF","Guinean Franc"],["MVR","Maldivian Rufiyaa"],["MNT","Mongolian Tughrik"],["CDF","Congolese Franc"],["STD","Sao Tomean Dobra"],["TJS","Tajikistani Somoni"],["KPW","North Korean Won"],["MMK","Burmese Kyat"],["LSL","Basotho Loti"],["LRD","Liberian Dollar"],["KGS","Kyrgyzstani Som"],["GIP","Gibraltar Pound"],["XPT","Platinum Ounce"],["MDL","Moldovan Leu"],["CUP","Cuban Peso"],["KHR","Cambodian Riel"],["MKD","Macedonian Denar"],["VUV","Ni-Vanuatu Vatu"],["MRO","Mauritanian Ouguiya"],["ANG","Dutch Guilder"],["SZL","Swazi Lilangeni"],["CVE","Cape Verdean Escudo"],["SRD","Surinamese Dollar"],["XPD","Palladium Ounce"],["SVC","Salvadoran Colon"],["BSD","Bahamian Dollar"],["XDR","IMF Special Drawing Rights"],["RWF","Rwandan Franc"],["AWG","Aruban or Dutch Guilder"],["DJF","Djiboutian Franc"],["BTN","Bhutanese Ngultrum"],["KMF","Comorian Franc"],["WST","Samoan Tala"],["SPL","Seborgan Luigino"],["ERN","Eritrean Nakfa"],["FKP","Falkland Island Pound"],["SHP","Saint Helenian Pound"],["JEP","Jersey Pound"],["TMT","Turkmenistani Manat"],["TVD","Tuvaluan Dollar"],["IMP","Isle of Man Pound"],["GGP","Guernsey Pound"],["ZMW","Zambian Kwacha"],["XBT","Bitcoin"]];
                var ar = []; 
                for(var i=0;i<_curArray.length;i++){ 
                    ar.push(_curArray[i][0]+", "+_curArray[i][1])
                };
                
                $.typeahead({
                    input: '.js-typeahead-currency',
                    order: "desc",
                    source: {
                        data: ar
                    },
                    callback: {
                        onInit: function (node) {
                            console.log('Typeahead Initiated on ' + node.selector);
                        }
                    }
                });

                $('[data-toggle="tooltip"]').tooltip();   
            });
    });
*/

</script>
