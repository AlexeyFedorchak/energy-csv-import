@extends('layouts.layoutMaster')
@section('title', 'Admin Dashboard')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@section('content')
<h2>Neuen Mitarbeiter anlegen</h2>
<div class="row">
  <form method="POST" action="{{ url('admin/users') }}">
    @csrf
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Mitarbeiterdetails</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="password">Passwort:</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Adressdetails</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="street">Straße:</label>
                  <input type="text" class="form-control" id="street" name="street">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="zipcode">Postleitzahl:</label>
                  <input type="text" class="form-control" id="zipcode" name="zipcode">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="city">Ort:</label>
                  <input type="text" class="form-control" id="city" name="city">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Kontaktinformation</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="phone">Telefonnummer:</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="website">Website:</label>
                  <input type="text" class="form-control" id="website" name="website">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Firmendetails</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="companyname">Firmenname:</label>
                  <input type="text" class="form-control" id="companyname" name="companyname">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="manager">Manager:</label>
                  <input type="text" class="form-control" id="manager" name="manager">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="contactperson">Ansprechpartner:</label>
                  <input type="text" class="form-control" id="contactperson" name="contactperson">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="taxnumber">UID:</label>
                  <input type="text" class="form-control" id="taxnumber" name="taxnumber">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="financeoffice">Finanzamt:</label>
                  <input type="text" class="form-control" id="financeoffice" name="financeoffice">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="socialsecuritynumber">SV Nummer:</label>
                  <input type="text" class="form-control" id="socialsecuritynumber" name="socialsecuritynumber">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="vatid">Steuernummer</label>
                  <input type="text" class="form-control" id="vatid" name="vatid">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="gisa1">GISA 1</label>
                  <input type="text" class="form-control" id="gisa1" name="gisa1">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="gisa2">GISA 2</label>
                  <input type="text" class="form-control" id="gisa2" name="gisa2">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Zahlungsdetails</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="bankname">Bank:</label>
                  <input type="text" class="form-control" id="bankname" name="bankname">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="iban">IBAN:</label>
                  <input type="text" class="form-control" id="iban" name="iban">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="bic">BIC:</label>
                  <input type="text" class="form-control" id="bic" name="bic">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header">
            <h6>Energy-Group Einstellungen</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="referral">Eingeladen von:</label>
                  <select class="form-control" id="referral" name="referral">
                    <option></option>
                    @foreach ($users as $user)
                    <option value="{{ $user->id }}">
                      {{ $user->name }} - {{ optional($user->team)->id }} | {{ optional($user->team)->name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="teamid">Team</label>
                  <select class="form-control" id="team" name="team">
                    <option></option>
                    @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->id }} - {{ $team->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="role">Rolle</label>
                  <select class="form-control" id="role" name="role">
                    <option value="{{ 0 }}">Worker</option>
                    <option value="{{ 2 }}">Team Admin</option>
                    <option value="{{ 1 }}">Admin</option>

                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h6>Vermittlernummern hinzufügen</h6>
        </div>
        <div class="card-body">
          
            <div id="vermittlernummerForm">
              <div class="row" id="row">
                <div class="col-md-3">
                <div class="form-group">
                    <label for="lieferanten_id">Supplier:</label>
                    <select class="form-control lieferanten_id" id="lieferanten_id" name="lieferanten_id[]">
                      <option value="">Select Supplier</option>
                    @foreach($lieferantens as $lieferant)
                            <option value="{{ $lieferant->id }}">{{ $lieferant->name }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="vermittlernummer">Vermittlernummer:</label>
                    <input type="text" class="form-control" id="vermittlernummer" name="vermittlernummer[]">
                </div>
                </div>
                </div>
                   <div id="newinput"></div>

                <button type="button" class="btn btn-primary" id="addMore">Add Another</button>
            </div>
        
      </div>
    </div>




    <div class="form-group p-2">
      <button type="submit" class="btn btn-primary">Speichern</button>
    </div>

</div>
</form>
</div>
<script>
  // Initialize the Select2 library for the referral and team dropdowns
  $('#referral, #team').select2({
    placeholder: 'Bitte eine Option wählen',
    allowClear: true,
  });

</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('addMore').addEventListener('click', function() {
        var form = document.getElementById('vermittlernummerForm');
        var newFormGroup = document.createElement('div');
        // let div = document.createElement("div");
        newFormGroup.innerHTML = `
			<div class="row" id="row">
                <div class="col-md-3">
            <div class="form-group">
                <label for="lieferanten_id">Supplier:</label>
                <select class="form-control lieferanten_id" id="lieferanten_id1" name="lieferanten_id[]">
					<option value="">Select Supplier</option>
                    @foreach($lieferantens as $lieferant)
                        <option value="{{ $lieferant->id }}">{{ $lieferant->name }}</option>
                    @endforeach
                </select>
            </div>
			</div>
			<div class="col-md-6">
            <div class="form-group">
                <label for="vermittlernummer">Vermittlernummer:</label>
                <input type="text" class="form-control" id="vermittlernummer" name="vermittlernummer[]">
            </div>
			</div>
  			<div class="col-md-2 mt-4">
  			<button class="btn btn-danger " id="DeleteRow" type="button">
                <i class="bi bi-trash"></i> Delete</button> 
  		</div>
  		</div>
        `;
      console.log(newFormGroup);
        $('#newinput').append(newFormGroup);
      check_now()
    });
  $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
  })
  check_now();
  $(document).on('change', 'select[name*=lieferanten_id]', function() {
    check_now() //on change call as well
  })
  function check_now() {
    //remove disable from all options
    $("select[name*=lieferanten_id] option").prop('disabled', false)
    //loop through select box
    $("select[name*=lieferanten_id]").each(function() {
      var values = $(this).val()
      if (values != "") {
        //find option where value matches disable them
        $("select[name*=lieferanten_id]").not(this).find("option[value=" + values + "]").prop('disabled', true);
      }
    })
  }
 
});
  
</script>
<script>
  // PLZ zu Ort JS
const zipToCity={1010:"Wien",1020:"Wien",1030:"Wien",1040:"Wien",1050:"Wien",1060:"Wien",1070:"Wien",1080:"Wien",1090:"Wien",1100:"Wien",1110:"Wien",1120:"Wien",1130:"Wien",1140:"Wien",1150:"Wien",1160:"Wien",1170:"Wien",1180:"Wien",1190:"Wien",1200:"Wien",1210:"Wien",1220:"Wien",1230:"Wien",1300:"Wien-Flughafen",2e3:"Stockerau",2002:"Gro\xdfmugl",2003:"Leitzersdorf",2004:"Niederhollabrunn",2011:"Sierndorf",2013:"G\xf6llersdorf",2014:"Breitenwaida",2020:"Hollabrunn",2022:"Immendorf",2023:"Nappersdorf",2024:"Mailberg",2031:"Eggendorf im Thale",2032:"Enzersdorf im Thale",2033:"Kammersdorf",2034:"Gro\xdfharras",2041:"Wullersdorf",2042:"Guntersdorf",2051:"Zellerndorf",2052:"Pernersdorf-Pfaffendorf",2053:"Jetzelsdorf",2054:"Haugsdorf",2061:"Hadres",2062:"Seefeld-Gro\xdfkadolz",2063:"Zwingendorf",2064:"Wulzeshofen",2070:"Retz",2073:"Schrattenthal",2074:"Unterretzbach",2081:"Niederfladnitz",2082:"Hardegg",2083:"Plei\xdfing",2084:"Weitersfeld",2091:"Langau",2092:"Riegersburg",2093:"Geras",2094:"Zissersdorf",2095:"Drosendorf",2100:"Korneuburg",2102:"Bisamberg",2103:"Langenzersdorf",2104:"Spillern",2105:"Oberrohrbach",2111:"R\xfcckersdorf-Harmannsdorf",2112:"W\xfcrnitz",2113:"Karnabrunn",2114:"Gro\xdfru\xdfbach",2115:"Ernstbrunn",2116:"Niederleis",2120:"Wolkersdorf im Weinviertel",2122:"Ulrichskirchen",2123:"Schleinbach",2124:"Niederkreuzstetten",2125:"Neubau",2126:"Ladendorf",2130:"Mistelbach",2132:"Fr\xe4ttingsdorf",2133:"Loosdorf",2134:"Staatz-Kautendorf",2135:"Neudorf im Weinviertel",2136:"Laa an der Thaya",2141:"Ameis",2143:"Gro\xdfkrut",2144:"Altlichtenwarth",2145:"Hausbrunn",2151:"Asparn an der Zaya",2152:"Gnadendorf",2153:"Stronsdorf",2154:"Unterstinkenbrunn",2161:"Poysbrunn",2162:"Falkenstein",2163:"Ottenthal",2164:"Wildend\xfcrnbach",2165:"Drasenhofen",2170:"Poysdorf",2171:"Herrnbaumgarten",2172:"Schrattenberg",2181:"Dobermannsdorf",2182:"Palterndorf",2183:"Neusiedl an der Zaya",2184:"Hauskirchen",2185:"Prinzendorf an der Zaya",2191:"Gaweinstal",2192:"Kettlasbrunn",2193:"Wilfersdorf",2201:"Gerasdorf",2202:"Enzersfeld",2203:"Gro\xdfebersdorf",2211:"Pillichsdorf",2212:"Gro\xdfengersdorf",2213:"Bockflie\xdf",2214:"Auersthal",2215:"Raggendorf",2221:"Gro\xdf Schweinbarth",2222:"Bad Pirawarth",2223:"Hohenruppersdorf",2224:"Obersulz",2225:"Zistersdorf",2230:"G\xe4nserndorf",2231:"Strasshof an der Nordbahn",2232:"Deutsch Wagram",2241:"Sch\xf6nkirchen",2242:"Prottes",2243:"Matzen",2244:"Spannberg",2245:"Velm-G\xf6tzendorf",2251:"Ebenthal",2252:"Ollersdorf",2253:"Weikendorf",2261:"Angern an der March",2262:"Stillfried",2263:"D\xfcrnkrut",2264:"Jedenspeigen",2265:"Dr\xf6sing",2272:"Niederabsdorf",2273:"Hohenau an der March",2274:"Rabensburg",2275:"Bernhardsthal",2276:"Reintal",2280:"Glinzendorf",2281:"Raasdorf",2282:"Markgrafneusiedl",2283:"Obersiebenbrunn",2284:"Untersiebenbrunn",2285:"Leopoldsdorf im Marchfelde",2286:"Haringsee",2291:"Lassee",2292:"Engelhartstetten",2293:"Marchegg Stadt",2294:"Marchegg Bahnhof",2295:"Oberweiden",2301:"Gro\xdf-Enzersdorf",2304:"Orth an der Donau",2305:"Eckartsau",2320:"Schwechat",2322:"Zw\xf6lfaxing",2325:"Himberg",2326:"Maria Lanzendorf",2331:"V\xf6sendorf",2332:"Hennersdorf",2333:"Leopoldsdorf",2334:"V\xf6sendorf",2340:"M\xf6dling",2344:"Maria Enzersdorf",2345:"Brunn am Gebirge",2351:"Wiener Neudorf",2352:"Gumpoldskirchen",2353:"Guntramsdorf",2361:"Laxenburg",2362:"Biedermannsdorf",2371:"Hinterbr\xfchl",2372:"Gie\xdfh\xfcbl",2380:"Perchtoldsdorf",2381:"Laab im Walde",2384:"Breitenfurt bei Wien",2391:"Kaltenleutgeben",2392:"Sulz im Wienerwald",2393:"Sittendorf",2401:"Fischamend",2402:"Maria Ellend",2403:"Regelsbrunn",2404:"Petronell",2405:"Bad Deutsch Altenburg",2410:"Hainburg an der Donau",2412:"Wolfsthal",2413:"Berg",2421:"Kittsee",2422:"Pama",2423:"Deutsch Jahrndorf",2424:"Zurndorf",2425:"Nickelsdorf",2431:"Kleinneusiedl",2432:"Schwadorf",2433:"Margarethen am Moos",2434:"G\xf6tzendorf an der Leitha",2435:"Ebergassing",2440:"Gramatneusiedl",2441:"Mitterndorf an der Fischa",2442:"Unterwaltersdorf",2443:"Deutsch-Brodersdorf",2444:"Seibersdorf",2451:"Hof am Leithaberge",2452:"Mannersdorf am Leithagebirge",2453:"Sommerein",2454:"Trautmannsdorf an der Leitha",2460:"Bruck an der Leitha",2462:"Wilfleinsdorf",2463:"Stixneusiedl",2464:"G\xf6ttlesbrunn",2465:"H\xf6flein",2471:"Rohrau",2472:"Prellenkirchen",2473:"Potzneusiedl",2474:"Gattendorf",2475:"Neudorf",2481:"Achau",2482:"M\xfcnchendorf",2483:"Ebreichsdorf",2485:"Wampersdorf",2486:"Pottendorf",2490:"Ebenfurth",2491:"Neufeld an der Leitha",2492:"Eggendorf",2493:"Lichtenw\xf6rth-Nadelburg",2500:"Baden",2504:"Soo\xdf",2511:"Pfaffst\xe4tten",2512:"Tribuswinkel",2514:"Traiskirchen",2521:"Trumau",2522:"Oberwaltersdorf",2523:"Tattendorf",2524:"Teesdorf",2525:"G\xfcnselsdorf",2531:"Gaaden",2532:"Heiligenkreuz im Wienerwald",2533:"Klausen-Leopoldsdorf",2534:"Alland",2540:"Bad V\xf6slau",2542:"Kottingbrunn",2544:"Leobersdorf",2551:"Enzesfeld-Lindabrunn",2552:"Hirtenberg",2560:"Berndorf",2561:"Hernstein",2563:"Pottenstein",2564:"Weissenbach an der Triesting",2565:"Neuhaus",2571:"Altenmarkt-Thenneberg",2572:"Kaumberg",2601:"Sollenau",2602:"Blumau-Neuri\xdfhof",2603:"Felixdorf",2604:"Theresienfeld",2620:"Neunkirchen",2624:"Breitenau",2625:"Schwarzau am Steinfelde",2630:"Ternitz",2631:"Sieding-Stixenstein",2632:"Wimpassing im Schwarzatale",2640:"Gloggnitz",2641:"Schottwien",2650:"Payerbach",2651:"Reichenau an der Rax",2654:"Prein an der Rax",2661:"Na\xdfwald",2662:"Schwarzau im Gebirge",2663:"Rohr im Gebirge",2671:"K\xfcb",2673:"Breitenstein",2680:"Semmering",2700:"Wiener Neustadt",2721:"Bad Fischau",2722:"Winzendorf",2723:"Muthmannsdorf",2724:"Hohe Wand-Stollhof",2731:"St. Egyden am Steinfeld",2732:"Willendorf",2733:"Gr\xfcnbach am Schneeberg",2734:"Puchberg am Schneeberg",2751:"Steinabr\xfcckl",2752:"W\xf6llersdorf",2753:"Markt Piesting",2754:"Waldegg",2755:"Oed",2761:"Miesenbach",2763:"Pernitz",2770:"Gutenstein",2801:"Katzelsdorf",2802:"Hochwolkersdorf",2803:"Schwarzenbach",2811:"Wiesmath",2812:"Hollenthon",2813:"Lichtenegg",2821:"Lanzenkirchen",2822:"Bad Erlach",2823:"Pitten",2824:"Seebenstein",2831:"Warth",2832:"Thernberg",2833:"Bromberg",2840:"Grimmenstein",2842:"Edlitz",2851:"Krumbach",2852:"Hochneukirchen",2853:"Bad Sch\xf6nau",2860:"Kirchschlag in der Buckligen Welt",2870:"Aspang",2871:"Z\xf6bern",2872:"M\xf6nichkirchen",2873:"Feistritz am Wechsel",2880:"Kirchberg am Wechsel",2881:"Trattenbach",3001:"Mauerbach",3002:"Purkersdorf",3003:"Gablitz",3004:"Ried am Riederberg",3011:"Untertullnerbach",3012:"Wolfsgraben",3013:"Tullnerbach-Lawies",3021:"Pressbaum",3031:"Rekawinkel",3032:"Eichgraben",3033:"Altlengbach",3034:"Maria Anzbach",3040:"Neulengbach",3041:"Asperhofen",3042:"W\xfcrmla",3051:"St. Christophen",3052:"Innermanzing",3053:"Laaben",3061:"Ollersbach",3062:"Kirchstetten",3071:"B\xf6heimkirchen",3072:"Kasten bei B\xf6heimkirchen",3073:"St\xf6ssing",3074:"Michelbach",3100:"St. P\xf6lten",3104:"St. P\xf6lten-Harland",3105:"St. P\xf6lten-Radlberg",3107:"St. P\xf6lten-Traisenpark",3110:"Neidling",3121:"Karlstetten",3122:"Gansbach",3123:"Obritzberg",3124:"Oberw\xf6lbling",3125:"Statzendorf",3130:"Herzogenburg",3131:"Getzersdorf",3133:"Traismauer",3134:"Nu\xdfdorf",3140:"Pottenbrunn",3141:"Kapelln",3142:"Perschling",3143:"Pyhra",3144:"Wald",3150:"Wilhelmsburg",3151:"St. Georgen am Steinfelde",3153:"Eschenau",3160:"Traisen",3161:"St. Veit an der G\xf6lsen",3162:"Rainfeld",3163:"Rohrbach",3170:"Hainfeld",3171:"Kleinzell-Salzerbad",3172:"Ramsau",3180:"Lilienfeld",3183:"Freiland",3184:"T\xfcrnitz",3192:"Hohenberg",3193:"St. Aegyd am Neuwalde",3195:"Kernhof",3200:"Ober-Grafendorf",3202:"Hofstetten",3203:"Rabenstein an der Pielach",3204:"Kirchberg an der Pielach",3205:"Weinburg",3211:"Loich",3212:"Schwarzenbach an der Pielach",3213:"Frankenfels",3214:"Puchenstuben",3221:"G\xf6sing an der Mariazellerbahn",3222:"Annaberg",3223:"Wienerbruck",3224:"Mitterbach",3231:"St. Margarethen an der Sierning",3232:"Bischofstetten",3233:"Kilb",3240:"Mank",3241:"Kirnberg an der Mank",3242:"Texing",3243:"St. Leonhard am Forst",3244:"Ruprechtshofen",3250:"Wieselburg",3251:"Purgstall",3252:"Petzenkirchen",3253:"Erlauf",3254:"Bergland",3261:"Steinakirchen am Forst",3262:"Wang",3263:"Randegg",3264:"Gresten",3270:"Scheibbs",3281:"Oberndorf an der Melk",3282:"St. Georgen an der Leys",3283:"St. Anton an der Je\xdfnitz",3291:"Kienberg",3292:"Gaming",3293:"Lunz am See",3294:"Langau",3295:"Lackenhof",3300:"Amstetten",3304:"St. Georgen am Ybbsfelde",3311:"Zeillern",3312:"Oed",3313:"Wallsee",3314:"Strengberg",3321:"Ardagger",3322:"Viehdorf",3323:"Neustadtl an der Donau",3324:"Euratsfeld",3325:"Ferschnitz",3331:"Kematen",3332:"Rosenau am Sonntagberg",3333:"B\xf6hlerwerk",3334:"Gaflenz",3335:"Weyer",3340:"Waidhofen an der Ybbs",3341:"Ybbsitz",3342:"Opponitz",3343:"Hollenstein an der Ybbs",3344:"St. Georgen am Reith",3345:"G\xf6stling an der Ybbs",3350:"Haag",3351:"Weistrach",3352:"St. Peter in der Au",3353:"Seitenstetten",3354:"Wolfsbach",3355:"Ertl",3361:"Aschbach Markt",3362:"Mauer-\xd6hling",3363:"Ulmerfeld-Hausmening",3364:"Neuhofen an der Ybbs",3365:"Allhartsberg",3370:"Ybbs an der Donau",3371:"Neumarkt an der Ybbs",3372:"Blindenmarkt",3373:"Kemmelbach",3374:"S\xe4usenstein",3375:"Krummnu\xdfbaum",3376:"St. Martin-Karlsbach",3380:"P\xf6chlarn",3381:"Golling",3382:"Loosdorf",3383:"H\xfcrm",3384:"Gro\xdf Sierning",3385:"Prinzersdorf",3386:"Hafnerbach",3390:"Melk",3392:"Dunkelsteinerwald",3393:"Matzleinsdorf",3394:"Sch\xf6nb\xfchel-Aggsbach",3400:"Klosterneuburg",3413:"Hintersdorf",3420:"Kritzendorf",3421:"H\xf6flein an der Donau",3422:"Greifenstein",3423:"St. Andr\xe4-W\xf6rdern",3424:"Zeiselmauer",3425:"Langenlebarn",3426:"Muckendorf-Wipfing",3430:"Tulln an der Donau",3433:"K\xf6nigstetten",3434:"Tulbing",3435:"Zwentendorf an der Donau",3441:"Judenau",3442:"Langenrohr",3443:"Sieghartskirchen",3451:"Michelhausen",3452:"Atzenbrugg",3454:"Sitzenberg-Reidling",3462:"Absdorf",3463:"Stetteldorf am Wagram",3464:"Hausleiten",3465:"K\xf6nigsbrunn am Wagram",3470:"Kirchberg am Wagram",3471:"Gro\xdfriedenthal",3472:"Hohenwarth",3473:"M\xfchlbach am Manhartsberg",3474:"Altenw\xf6rth",3481:"Fels am Wagram",3482:"G\xf6sing am Wagram",3483:"Feuersbrunn",3484:"Grafenw\xf6rth",3485:"Haitzendorf",3491:"Stra\xdf im Stra\xdfertale",3492:"Etsdorf am Kamp",3493:"Hadersdorf am Kamp",3494:"Gedersdorf",3495:"Rohrendorf bei Krems",3500:"Krems an der Donau",3506:"Krems-Hollenburg",3508:"Paudorf",3511:"Furth bei G\xf6ttweig",3512:"Mautern",3521:"Obermeisling",3522:"Lichtenau",3524:"Grainbrunn",3525:"Sallingberg",3531:"Niedernondorf",3532:"Rastenfeld",3533:"Friedersbach",3541:"Senftenberg",3542:"Gf\xf6hl",3543:"Krumau am Kamp",3544:"Idolsberg",3550:"Langenlois",3552:"Lengenfeld",3553:"Schiltern",3561:"Z\xf6bing",3562:"Sch\xf6nberg",3564:"Plank am Kamp",3571:"Gars am Kamp",3572:"St. Leonhard am Hornerwald",3573:"Rosenburg",3580:"Horn",3591:"Altenburg",3592:"R\xf6hrenbach",3593:"Neup\xf6lla",3594:"Franzen",3595:"Brunn an der Wild",3601:"D\xfcrnstein",3602:"Rossatz",3610:"Wei\xdfenkirchen in der Wachau",3611:"Gro\xdfheinrichschlag",3613:"Albrechtsberg an der Gro\xdfen Krems",3620:"Spitz",3621:"Mitterarnsdorf",3622:"M\xfchldorf",3623:"Kottes",3631:"Ottenschlag",3632:"Bad Traunstein",3633:"Sch\xf6nbach",3641:"Aggsbach Markt",3642:"Aggsbach Dorf",3643:"Maria Laach am Jauerling",3644:"Emmersdorf an der Donau",3650:"P\xf6ggstall",3652:"Leiben",3653:"Weiten",3654:"Raxendorf",3660:"Klein-P\xf6chlarn",3661:"Artstetten",3662:"M\xfcnichreith",3663:"Laimbach am Ostrong",3664:"Martinsberg",3665:"Gutenbrunn",3671:"Marbach an der Donau",3672:"Maria Taferl",3680:"Persenbeug",3681:"Hofamt Priel",3683:"Yspertal",3684:"St. Oswald",3691:"N\xf6chling",3701:"Gro\xdfweikersdorf",3702:"Niederru\xdfbach",3704:"Glaubendorf",3710:"Ziersdorf",3711:"Gro\xdfmeiseldorf",3712:"Maissau",3713:"Harmannsdorf",3714:"Sitzendorf an der Schmida",3720:"Ravelsbach",3721:"Limberg",3722:"Straning",3730:"Eggenburg",3741:"Pulkau",3742:"Theras",3743:"R\xf6schitz",3744:"Stockern",3751:"Sigmundsherberg",3752:"Walkenstein",3753:"H\xf6tzelsdorf",3754:"Irnfritz",3761:"Messern",3762:"Ludweis",3763:"Japons",3800:"G\xf6pfritz an der Wild",3804:"Allentsteig",3811:"Kirchberg an der Wild",3812:"Gro\xdf Siegharts",3813:"Dietmanns",3814:"Aigen",3820:"Raabs an der Thaya",3822:"Karlstein an der Thaya",3823:"Weikertschlag an der Thaya",3824:"Gro\xdfau",3830:"Waidhofen an der Thaya",3834:"Pfaffenschlag bei Waidhofen an der Thaya",3841:"Windigsteig",3842:"Thaya",3843:"Dobersberg",3844:"Waldkirchen an der Thaya",3851:"Kautzen",3852:"Gastern",3860:"Heidenreichstein",3861:"Eggern",3862:"Eisgarn",3863:"Reingers",3871:"Nagelberg",3872:"Langegg",3873:"Brand",3874:"Litschau",3900:"Schwarzenau",3902:"Vitis",3903:"Echsenbach",3910:"Zwettl",3911:"Rappottenstein",3912:"Grafenschlag",3913:"Gro\xdfg\xf6ttfritz",3914:"Waldhausen",3920:"Gro\xdf Gerungs",3921:"Langschlag",3922:"Gro\xdfsch\xf6nau",3923:"Jagenbach",3924:"Rosenau Schlo\xdf",3925:"Arbesbach",3931:"Schweiggers",3932:"Kirchberg am Walde",3942:"Hirschbach",3943:"Schrems",3944:"P\xfcrbach",3945:"Hoheneich",3950:"Gm\xfcnd",3961:"Waldenstein",3962:"Heinrichs bei Weitra",3970:"Weitra",3971:"St. Martin",3972:"Bad Gro\xdfpertholz",3973:"Karlstift",4020:"Linz",4030:"Linz",4040:"Linz",4048:"Puchenau",4050:"Traun",4052:"Ansfelden",4053:"Haid",4055:"Pucking",4060:"Leonding",4061:"Pasching",4062:"Thening",4063:"H\xf6rsching",4064:"Oftering",4070:"Eferding",4072:"Alkoven",4073:"Wilhering",4074:"Stroheim",4075:"Breitenaich",4076:"St. Marienkirchen an der Polsenz",4081:"Hartkirchen",4082:"Aschach an der Donau",4083:"Haibach ob der Donau",4084:"St. Agatha",4085:"Wesenufer",4090:"Engelhartszell",4091:"Vichtenstein",4092:"Esternberg",4100:"Ottensheim",4101:"Feldkirchen an der Donau",4102:"Goldw\xf6rth",4111:"Walding",4112:"Rottenegg",4113:"St. Martin im M\xfchlkreis",4114:"Neuhaus an der Donau",4115:"Kleinzell im M\xfchlkreis",4116:"St. Ulrich im M\xfchlkreis",4120:"Neufelden",4121:"Altenfelden",4122:"Arnreit",4131:"Kirchberg ob der Donau",4132:"Lembach im M\xfchlkreis",4133:"Niederkappel",4134:"Putzleinsdorf",4141:"Pfarrkirchen im M\xfchlkreis",4142:"Hofkirchen im M\xfchlkreis",4143:"Neustift im M\xfchlkreis",4144:"Oberkappel",4150:"Rohrbach in Ober\xf6sterreich",4151:"Oepping",4152:"Sarleinsbach",4153:"Peilstein im M\xfchlviertel",4154:"Kollerschlag",4155:"Nebelberg",4160:"Aigen-Schl\xe4gl",4161:"Ulrichsberg",4162:"Julbach",4163:"Klaffer am Hochficht",4164:"Schwarzenberg am B\xf6hmerwald",4170:"Haslach an der M\xfchl",4171:"St. Peter am Wimberg",4172:"St. Johann am Wimberg",4173:"St. Veit im M\xfchlkreis",4174:"Niederwaldkirchen",4175:"Herzogsdorf",4180:"Zwettl an der Rodl",4181:"Oberneukirchen",4182:"Waxenberg",4183:"Traberg",4184:"Helfenberg",4190:"Bad Leonfelden",4191:"Vorderwei\xdfenbach",4192:"Schenkenfelden",4193:"Reichenthal",4201:"Gramastetten",4202:"Hellmons\xf6dt",4203:"Altenberg bei Linz",4204:"Reichenau im M\xfchlkreis",4209:"Engerwitzdorf",4210:"Gallneukirchen",4211:"Alberndorf in der Riedmark",4212:"Neumarkt im M\xfchlkreis",4213:"Unterweitersdorf",4221:"Steyregg",4222:"St. Georgen an der Gusen",4223:"Katsdorf",4224:"Wartberg ob der Aist",4225:"Luftenberg",4230:"Pregarten",4232:"Hagenberg im M\xfchlkreis",4240:"Freistadt",4242:"Hirschbach im M\xfchlkreis",4251:"Sandl",4252:"Liebenau",4261:"Rainbach im M\xfchlkreis",4262:"Leopoldschlag",4263:"Windhaag bei Freistadt",4264:"Gr\xfcnbach",4271:"St. Oswald bei Freistadt",4272:"Weitersfelden",4273:"Unterwei\xdfenbach",4274:"Sch\xf6nau im M\xfchlkreis",4280:"K\xf6nigswiesen",4281:"M\xf6nchdorf",4282:"Pierbach",4283:"Bad Zell",4284:"Tragwein",4291:"Lasberg",4292:"Kefermarkt",4293:"Gutau",4294:"St. Leonhard bei Freistadt",4300:"St. Valentin",4303:"St. Pantaleon",4310:"Mauthausen",4311:"Schwertberg",4312:"Ried in der Riedmark",4320:"Perg",4322:"Windhaag bei Perg",4323:"M\xfcnzbach",4324:"Rechberg",4331:"Naarn",4332:"Au an der Donau",4341:"Arbing",4342:"Baumgartenberg",4343:"Mitterkirchen",4351:"Saxen",4352:"Klam",4360:"Grein",4362:"Bad Kreuzen",4363:"Pabneukirchen",4364:"St. Thomas",4371:"Dimbach",4372:"St. Georgen am Walde",4381:"St. Nikola an der Donau",4382:"Sarmingstein",4391:"Waldhausen im Strudengau",4392:"Dorfstetten",4400:"Steyr",4407:"Steyr-Gleink",4421:"Aschach an der Steyr",4431:"Haidershofen",4432:"Ernsthofen",4441:"Behamberg",4442:"Kleinraming",4443:"Maria Neustift",4451:"Garsten",4452:"Ternberg",4453:"Trattenbach",4460:"Losenstein",4461:"Laussa",4462:"Reichraming",4463:"Gro\xdframing",4464:"Kleinreifling",4470:"Enns",4481:"Asten",4482:"Ennsdorf",4483:"Hargelsberg",4484:"Kronstorf",4490:"St. Florian",4491:"Niederneukirchen",4492:"Hofkirchen im Traunkreis",4493:"Wolfern",4501:"Neuhofen an der Krems",4502:"St. Marien",4511:"Allhaming",4521:"Schiedlberg",4522:"Sierning",4523:"Neuzeug",4531:"Kematen an der Krems",4532:"Rohr im Kremstal",4533:"Piberbach",4540:"Bad Hall",4541:"Adlwang",4542:"Nu\xdfbach",4550:"Kremsm\xfcnster",4551:"Ried im Traunkreis",4552:"Wartberg an der Krems",4553:"Schlierbach",4554:"Oberschlierbach",4560:"Kirchdorf an der Krems",4562:"Steinbach am Ziehberg",4563:"Micheldorf",4564:"Klaus an der Pyhrnbahn",4565:"Inzersdorf im Kremstal",4571:"Steyrling",4572:"St. Pankraz",4573:"Hinterstoder",4574:"Vorderstoder",4575:"Ro\xdfleithen",4580:"Windischgarsten",4581:"Rosenau am Hengstpa\xdf",4582:"Spital am Pyhrn",4591:"Molln",4592:"Leonstein",4593:"Obergr\xfcnburg",4594:"Gr\xfcnburg",4595:"Waldneukirchen",4596:"Steinbach an der Steyr",4600:"Wels",4611:"Buchkirchen",4612:"Scharten",4613:"Mistelbach bei Wels",4614:"Marchtrenk",4615:"Holzhausen",4616:"Wei\xdfkirchen",4621:"Sipbachzell",4622:"Eggendorf im Traunkreis",4623:"Gunskirchen",4624:"Pennewang",4625:"Offenhausen",4631:"Krenglbach",4632:"Pichl bei Wels",4633:"Kematen am Innbach",4641:"Steinhaus",4642:"Sattledt",4643:"Pettenbach",4644:"Scharnstein",4645:"Gr\xfcnau im Almtal",4650:"Lambach",4651:"Stadl-Paura",4652:"Steinerkirchen an der Traun",4653:"Eberstalzell",4654:"Bad Wimsbach-Neydharting",4655:"Vorchdorf",4656:"Kirchham",4661:"Roitham am Traunfall",4662:"Steyrerm\xfchl",4663:"Laakirchen",4664:"Oberweis",4671:"Neukirchen bei Lambach",4672:"Bachmanning",4673:"Gaspoltshofen",4674:"Altenhof am Hausruck",4675:"Weibern",4676:"Aistersheim",4680:"Haag am Hausruck",4681:"Rottenbach",4682:"Geboltskirchen",4690:"Schwanenstadt",4691:"Breitensch\xfctzing",4692:"Niederthalheim",4693:"Desselbrunn",4694:"Ohlsdorf",4701:"Bad Schallerbach",4702:"Wallern an der Trattnach",4707:"Schl\xfc\xdflberg",4710:"Grieskirchen",4712:"Michaelnbach",4713:"Gallspach",4714:"Meggenhofen",4715:"Taufkirchen an der Trattnach",4716:"Hofkirchen an der Trattnach",4720:"Neumarkt im Hausruckkreis",4721:"Altschwendt",4722:"Peuerbach",4723:"Natternbach",4724:"Neukirchen am Walde",4725:"St. Aegidi",4730:"Waizenkirchen",4731:"Prambachkirchen",4732:"St. Thomas",4733:"Heiligenberg",4741:"Wendling",4742:"Pram",4743:"Peterskirchen",4751:"Dorf",4752:"Riedau",4753:"Taiskirchen im Innkreis",4754:"Andrichsfurt",4755:"Zell an der Pram",4760:"Raab",4761:"Enzenkirchen",4762:"St. Willibald",4770:"Andorf",4771:"Sigharting",4772:"Lambrechten",4773:"Eggerding",4774:"St. Marienkirchen bei Sch\xe4rding",4775:"Taufkirchen an der Pram",4776:"Diersbach",4777:"Mayrhof",4780:"Sch\xe4rding",4782:"St. Florian am Inn",4783:"Wernstein am Inn",4784:"Schardenberg",4785:"Freinberg",4786:"Brunnenthal",4791:"Rainbach im Innkreis",4792:"M\xfcnzkirchen",4793:"St. Roman",4794:"Kopfing im Innkreis",4800:"Attnang-Puchheim",4801:"Traunkirchen",4802:"Ebensee",4810:"Gmunden",4812:"Pinsdorf",4813:"Altm\xfcnster",4814:"Neukirchen",4816:"Gschwandt",4817:"St. Konrad",4820:"Bad Ischl",4821:"Lauffen",4822:"Bad Goisern am Hallst\xe4ttersee",4823:"Steeg",4824:"Gosau",4825:"Gosau-Hintertal",4830:"Hallstatt",4831:"Obertraun",4840:"V\xf6cklabruck",4841:"Ungenach",4842:"Zell am Pettenfirst",4843:"Ampflwang",4844:"Regau",4845:"Rutzenmoos",4846:"Redlham",4849:"Puchkirchen am Trattberg",4850:"Timelkam",4851:"Gampern",4852:"Weyregg am Attersee",4853:"Steinbach am Attersee",4854:"Wei\xdfenbach",4860:"Lenzing",4861:"Sch\xf6rfling",4863:"Seewalchen am Attersee",4864:"Attersee",4865:"Nu\xdfdorf am Attersee",4866:"Unterach",4870:"V\xf6cklamarkt",4871:"Zipf",4872:"Neukirchen an der V\xf6ckla",4873:"Frankenburg am Hausruck",4880:"St. Georgen im Attergau",4881:"Stra\xdf im Attergau",4882:"Oberwang",4890:"Frankenmarkt",4891:"P\xf6ndorf",4892:"Fornach",4893:"Zell am Moos",4894:"Oberhofen am Irrsee",4901:"Ottnang",4902:"Wolfsegg am Hausruck",4903:"Manning",4904:"Atzbach",4906:"Eberschwang",4910:"Ried im Innkreis",4911:"Tumeltsham",4912:"Neuhofen im Innkreis",4920:"Schildorn",4921:"Hohenzell",4922:"Geiersberg",4923:"Lohnsburg",4924:"Waldzell",4925:"Pramet",4926:"St. Marienkirchen am Hausruck",4931:"Mettmach",4932:"Kirchheim im Innkreis",4933:"Wildenau",4941:"Mehrnbach",4942:"Gurten",4943:"Geinberg",4950:"Altheim",4951:"Polling im Innkreis",4952:"Weng im Innkreis",4961:"M\xfchlheim am Inn",4962:"Mining",4963:"St. Peter am Hart",4970:"Eitzing",4971:"Aurolzm\xfcnster",4972:"Utzenaich",4973:"St. Martin",4974:"Ort im Innkreis",4975:"Suben",4980:"Antiesenhofen",4981:"Reichersberg",4982:"Obernberg am Inn",4983:"St. Georgen bei Obernberg am Inn",4984:"Weilbach",5020:"Salzburg",5023:"Salzburg-Gnigl",5026:"Salzburg-Aigen",5061:"Elsbethen-Glasenbach",5071:"Wals",5081:"Anif",5082:"Gr\xf6dig",5083:"Gartenau-St. Leonhard",5084:"Gro\xdfgmain",5090:"Lofer",5091:"Unken",5092:"St. Martin bei Lofer",5093:"Wei\xdfbach bei Lofer",5101:"Bergheim",5102:"Anthering",5110:"Oberndorf bei Salzburg",5111:"B\xfcrmoos",5112:"Lamprechtshausen",5113:"St. Georgen bei Salzburg",5114:"G\xf6ming",5120:"St. Pantaleon",5121:"Ostermiething",5122:"Ach",5123:"\xdcberackern",5131:"Franking",5132:"Geretsberg",5133:"Gilgenberg am Weilhart",5134:"Schwand im Innkreis",5141:"Moosdorf",5142:"Eggelsberg",5143:"Feldkirchen bei Mattighofen",5144:"Handenberg",5145:"Neukirchen an der Enknach",5151:"Nu\xdfdorf am Haunsberg",5152:"Michaelbeuern",5161:"Elixhausen",5162:"Obertrum am See",5163:"Mattsee",5164:"Seeham",5165:"Berndorf bei Salzburg",5166:"Perwang am Grabensee",5201:"Seekirchen",5202:"Neumarkt am Wallersee",5203:"K\xf6stendorf",5204:"Stra\xdfwalchen",5205:"Schleedorf",5211:"Friedburg",5212:"Schneegattern",5221:"Lochen am See",5222:"Munderfing",5223:"Pfaffst\xe4tt",5224:"Auerbach",5225:"Jeging",5230:"Mattighofen",5231:"Schalchen",5232:"Kirchberg bei Mattighofen",5233:"Pischelsdorf am Engelbach",5241:"Maria Schmolln",5242:"St. Johann am Walde",5251:"H\xf6hnhart",5252:"Aspach",5261:"Uttendorf",5270:"Mauerkirchen",5271:"Moosbach",5272:"Treubach",5273:"Ro\xdfbach",5274:"Burgkirchen",5280:"Braunau am Inn",5282:"Braunau",5300:"Hallwang",5301:"Eugendorf",5302:"Henndorf am Wallersee",5303:"Thalgau",5310:"Mondsee",5311:"Loibichl",5321:"Koppl",5322:"Hof bei Salzburg",5323:"Ebenau",5324:"Faistenau",5325:"Plainfeld",5330:"Fuschl am See",5340:"St. Gilgen",5342:"Abersee",5350:"Strobl",5360:"St. Wolfgang im Salzkammergut",5400:"Hallein",5411:"Oberalm",5412:"Puch bei Hallein",5421:"Adnet",5422:"Heilbad D\xfcrrnberg",5423:"St. Koloman",5424:"Bad Vigaun",5425:"Krispl",5431:"Kuchl",5440:"Golling an der Salzach",5441:"Abtenau",5442:"Ru\xdfbach am Pa\xdf Gsch\xfctt",5450:"Werfen",5451:"Tenneck",5452:"Pfarrwerfen",5453:"Werfenweng",5500:"Bischofshofen",5505:"M\xfchlbach am Hochk\xf6nig",5511:"H\xfcttau",5521:"Niedernfritz",5522:"St. Martin am Tennengebirge",5523:"Lung\xf6tz",5524:"Annaberg",5531:"Eben im Pongau",5532:"Filzmoos",5541:"Altenmarkt im Pongau",5542:"Flachau",5550:"Radstadt",5552:"Forstau",5561:"Untertauern",5562:"Obertauern",5563:"Tweng",5570:"Mauterndorf",5571:"Mariapfarr",5572:"St. Andr\xe4 im Lungau",5573:"Wei\xdfpriach",5574:"G\xf6riach",5575:"Lessach",5580:"Tamsweg",5581:"St. Margarethen im Lungau",5582:"St. Michael im Lungau",5583:"Muhr",5584:"Zederhaus",5585:"Unternberg",5591:"Ramingstein",5592:"Thomatal",5600:"St. Johann im Pongau",5602:"Wagrain",5603:"Kleinarl",5611:"Gro\xdfarl",5612:"H\xfcttschlag",5620:"Schwarzach im Pongau",5621:"St. Veit im Pongau",5622:"Goldegg",5630:"Bad Hofgastein",5632:"Dorfgastein",5640:"Bad Gastein",5645:"B\xf6ckstein",5651:"Lend",5652:"Dienten am Hochk\xf6nig",5660:"Taxenbach",5661:"Rauris",5662:"Gries",5671:"Bruck an der Gro\xdfglocknerstra\xdfe",5672:"Fusch an der Glocknerstra\xdfe",5700:"Zell am See",5710:"Kaprun",5721:"Piesendorf",5722:"Niedernsill",5723:"Uttendorf",5724:"Stuhlfelden",5730:"Mittersill",5731:"Hollersbach im Pinzgau",5732:"M\xfchlbach",5733:"Bramberg am Wildkogel",5741:"Neukirchen am Gro\xdfvenediger",5742:"Wald im Pinzgau",5743:"Krimml",5751:"Maishofen",5752:"Viehhofen",5753:"Saalbach",5754:"Hinterglemm",5760:"Saalfelden am Steinernen Meer",5761:"Maria Alm am Steinernen Meer",5771:"Leogang",6020:"Innsbruck",6060:"Hall in Tirol",6063:"Rum",6065:"Thaur",6067:"Absam",6068:"Mils",6069:"Gnadenwald",6070:"Ampass",6071:"Aldrans",6072:"Lans",6073:"Sistrans",6074:"Rinn",6075:"Tulfes",6080:"Innsbruck-Igls",6082:"Patsch",6083:"Ellb\xf6gen",6091:"G\xf6tzens",6092:"Birgitz",6094:"Axams",6095:"Grinzens",6100:"Seefeld in Tirol",6103:"Reith bei Seefeld",6105:"Leutasch",6108:"Scharnitz",6111:"Volders",6112:"Wattens",6113:"Wattenberg",6114:"Kolsass",6115:"Kolsassberg",6116:"Weer",6121:"Baumkirchen",6122:"Fritzens",6123:"Terfens",6130:"Schwaz",6133:"Weerberg",6134:"Vomp",6135:"Stans",6136:"Pill",6141:"Sch\xf6nberg im Stubaital",6142:"Mieders",6143:"Matrei am Brenner",6145:"Navis",6150:"Steinach am Brenner",6152:"Trins",6154:"St. Jodok am Brenner",6156:"Gries am Brenner",6157:"Obernberg am Brenner",6161:"Natters",6162:"Mutters",6165:"Telfes im Stubai",6166:"Fulpmes",6167:"Neustift im Stubaital",6170:"Zirl",6173:"Oberperfuss",6175:"Kematen in Tirol",6176:"V\xf6ls",6178:"Unterperfuss",6179:"Ranggen",6181:"Sellrain",6182:"Gries im Sellrain",6183:"K\xfchtai",6184:"St. Sigmund",6200:"Jenbach",6210:"Wiesing",6212:"Maurach",6213:"Pertisau",6215:"Achenkirch",6220:"Buch in Tirol",6222:"Gallzein",6230:"Brixlegg",6232:"M\xfcnster",6233:"Kramsach",6234:"Brandenberg",6235:"Reith im Alpbachtal",6236:"Alpbach",6240:"Rattenberg",6241:"Radfeld",6250:"Kundl",6252:"Breitenbach am Inn",6260:"Bruck am Ziller",6261:"Strass im Zillertal",6262:"Schlitters",6263:"F\xfcgen",6264:"F\xfcgenberg",6265:"Hart im Zillertal",6271:"Uderns",6272:"Kaltenbach",6273:"Ried im Zillertal",6274:"Aschau",6275:"Stumm",6276:"Stummerberg",6277:"Zellberg",6278:"Hainzenberg",6280:"Zell am Ziller",6281:"Gerlos",6283:"Hippach",6284:"Ramsau im Zillertal",6290:"Mayrhofen",6292:"Finkenberg",6293:"Tux",6294:"Hintertux",6295:"Ginzling",6300:"W\xf6rgl",6305:"Itter",6306:"S\xf6ll",6311:"Wildsch\xf6nau-Oberau",6313:"Wildsch\xf6nau-Auffach",6314:"Wildsch\xf6nau-Niederau",6320:"Angerberg",6321:"Angath",6322:"Kirchbichl",6323:"Bad H\xe4ring",6324:"Mariastein",6330:"Kufstein",6334:"Schwoich",6335:"Thiersee",6336:"Langkampfen",6341:"Ebbs",6342:"Niederndorf",6343:"Erl",6344:"Walchsee",6345:"K\xf6ssen",6346:"Niederndorferberg",6347:"Rettensch\xf6ss",6351:"Scheffau am Wilden Kaiser",6352:"Ellmau",6353:"Going am Wilden Kaiser",6361:"Hopfgarten",6363:"Westendorf",6364:"Brixen im Thale",6365:"Kirchberg in Tirol",6370:"Kitzb\xfchel",6371:"Aurach",6372:"Oberndorf in Tirol",6373:"Jochberg",6380:"St. Johann in Tirol",6382:"Kirchdorf in Tirol",6383:"Erpfendorf",6384:"Waidring",6385:"Schwendt",6391:"Fieberbrunn",6392:"St. Jakob in Haus",6393:"St. Ulrich am Pillersee",6395:"Hochfilzen",6401:"Inzing",6402:"Hatting",6403:"Flaurling",6404:"Polling",6405:"Pfaffenhofen",6406:"Oberhofen im Inntal",6408:"Pettnau",6410:"Telfs",6413:"Wildermieming",6414:"Mieming",6416:"Obsteig",6421:"Rietz",6422:"Stams",6423:"M\xf6tz",6424:"Silz",6425:"Haiming",6426:"Roppen",6430:"\xd6tztal Bahnhof",6432:"Sautens",6433:"Oetz",6441:"Umhausen",6444:"L\xe4ngenfeld",6450:"S\xf6lden",6452:"Hochs\xf6lden",6456:"Obergurgl",6458:"Vent",6460:"Imst",6462:"Karres",6463:"Karr\xf6sten",6464:"Tarrenz",6465:"Nassereith",6471:"Arzl im Pitztal",6473:"Wenns",6474:"Jerzens",6481:"St. Leonhard im Pitztal",6491:"Sch\xf6nwies",6492:"Imsterberg",6493:"Mils",6500:"Landeck",6511:"Zams",6521:"Flie\xdf",6522:"Prutz",6524:"Feichten im Kaunertal",6525:"Faggen",6526:"Kauns",6527:"Kaunerberg",6528:"Fendels",6531:"Ried im Oberinntal",6532:"Ladis",6533:"Fiss",6534:"Serfaus",6541:"T\xf6sens",6542:"Pfunds",6543:"Nauders",6544:"Spiss",6551:"Pians",6552:"Tobadill",6553:"See",6555:"Kappl",6561:"Ischgl",6562:"Mathon",6563:"Galt\xfcr",6571:"Strengen",6572:"Flirsch",6574:"Pettneu am Arlberg",6580:"St. Anton am Arlberg",6591:"Grins",6600:"Reutte",6604:"H\xf6fen",6610:"W\xe4ngle",6611:"Heiterwang",6621:"Bichlbach",6622:"Berwang",6623:"Namlos",6631:"Lermoos",6632:"Ehrwald",6633:"Biberwier",6642:"Stanzach",6644:"Elmen",6645:"Vorderhornbach",6646:"Hinterhornbach",6647:"Pfafflar",6650:"Gramais",6651:"H\xe4selgehr",6652:"Elbigenalp",6653:"Bach",6654:"Holzgau",6655:"Steeg",6670:"Forchach",6671:"Wei\xdfenbach am Lech",6672:"Nesselw\xe4ngle",6673:"Gr\xe4n",6675:"Tannheim",6677:"Schattwald",6682:"Vils",6691:"Jungholz",6700:"Bludenz",6706:"B\xfcrs",6707:"B\xfcrserberg",6708:"Brand",6710:"Nenzing",6712:"Th\xfcringen",6713:"Ludesch",6714:"N\xfcziders",6719:"Bludesch",6721:"Th\xfcringerberg",6722:"St. Gerold",6723:"Blons",6731:"Sonntag",6733:"Fontanella",6741:"Raggal",6751:"Braz",6752:"Dalaas",6754:"Kl\xf6sterle",6762:"Stuben",6763:"Z\xfcrs",6764:"Lech",6767:"Warth",6771:"St. Anton im Montafon",6773:"Vandans",6774:"Tschagguns",6780:"Schruns",6781:"Bartholom\xe4berg",6782:"Silbertal",6787:"Gargellen",6791:"St. Gallenkirch",6793:"Gaschurn",6794:"Partenen",6800:"Feldkirch",6811:"G\xf6fis",6812:"Meiningen",6820:"Frastanz",6822:"Satteins",6824:"Schlins",6830:"Rankweil",6832:"Sulz-R\xf6this",6833:"Klaus-Weiler",6834:"\xdcbersaxen",6835:"Zwischenwasser",6836:"Viktorsberg",6837:"Weiler",6840:"G\xf6tzis",6841:"M\xe4der",6842:"Koblach",6844:"Altach",6845:"Hohenems",6850:"Dornbirn",6858:"Schwarzach",6861:"Alberschwende",6863:"Egg",6866:"Andelsbuch",6867:"Schwarzenberg",6870:"Bezau",6874:"Bizau",6881:"Mellau",6882:"Schnepfau",6883:"Au",6884:"Dam\xfcls",6886:"Schoppernau",6888:"Schr\xf6cken",6890:"Lustenau",6900:"Bregenz",6911:"Lochau",6912:"H\xf6rbranz",6914:"Hohenweiler",6921:"Kennelbach",6922:"Wolfurt",6923:"Lauterach",6932:"Langen bei Bregenz",6933:"Doren",6934:"Sulzberg",6941:"Langenegg",6942:"Krumbach",6943:"Riefensberg",6951:"Lingenau",6952:"Hittisau",6960:"Wolfurt-Bahnhof",6971:"Hard",6972:"Fu\xdfach",6973:"H\xf6chst",6974:"Gai\xdfau",6991:"Riezlern",6992:"Hirschegg",6993:"Mittelberg",7e3:"Eisenstadt",7011:"Siegendorf",7012:"Zagersdorf",7013:"Klingenbach",7020:"Loipersbach im Burgenland",7021:"Dra\xdfburg",7022:"Schattendorf",7023:"Zemendorf",7024:"Hirm",7025:"P\xf6ttelsdorf",7031:"Krensdorf",7032:"Sigle\xdf",7033:"P\xf6ttsching",7034:"Zillingtal",7035:"Steinbrunn",7041:"Wulkaprodersdorf",7042:"Antau",7051:"Gro\xdfh\xf6flein",7052:"M\xfcllendorf",7053:"Hornstein",7061:"Trausdorf an der Wulka",7062:"St. Margarethen im Burgenland",7063:"Oggau",7064:"Oslip",7071:"Rust",7072:"M\xf6rbisch am See",7081:"Sch\xfctzen am Gebirge",7082:"Donnerskirchen",7083:"Purbach am Neusiedler See",7091:"Breitenbrunn am Neusiedler See",7092:"Winden am See",7093:"Jois",7100:"Neusiedl am See",7111:"Parndorf",7121:"Weiden am See",7122:"Gols",7123:"M\xf6nchhof",7131:"Halbturn",7132:"Frauenkirchen",7141:"Podersdorf am See",7142:"Illmitz",7143:"Apetlon",7151:"Wallern im Burgenland",7152:"Pamhagen",7161:"St. Andr\xe4 am Zicksee",7162:"Tadten",7163:"Andau",7201:"Neud\xf6rfl",7202:"Bad Sauerbrunn",7203:"Wiesen",7210:"Mattersburg",7212:"Forchtenstein",7221:"Marz",7222:"Rohrbach bei Mattersburg",7223:"Sieggraben",7301:"Deutschkreutz",7302:"Nikitsch",7304:"Gro\xdfwarasdorf",7311:"Neckenmarkt",7312:"Horitschon",7321:"Lackendorf",7322:"Lackenbach",7323:"Ritzing",7331:"Weppersdorf",7332:"Kobersdorf",7341:"Markt St. Martin",7342:"Kaisersdorf",7343:"Neutal",7344:"Stoob",7350:"Oberpullendorf",7361:"Lutzmannsburg",7371:"Unterrabnitz",7372:"Dra\xdfmarkt",7373:"Piringsdorf",7374:"Weingraben",7400:"Oberwart",7410:"Loipersdorf-Kitzladen",7411:"Markt Allhau",7412:"Wolfau",7421:"Tauchen-Schaueregg",7422:"Riedlingsdorf",7423:"Pinkafeld",7425:"Wiesfleck",7431:"Bad Tatzmannsdorf",7432:"Obersch\xfctzen",7433:"Mariasdorf",7434:"Bernstein",7435:"Unterkohlst\xe4tten",7441:"Pilgersdorf",7442:"Lockenhaus",7443:"Rattersdorf-Liebing",7444:"Mannersdorf an der Rabnitz",7451:"Oberloisdorf",7452:"Unterpullendorf",7453:"Steinberg-D\xf6rfl",7461:"Stadtschlaining",7463:"Weiden bei Rechnitz",7464:"Markt Neuhodis",7471:"Rechnitz",7472:"Schachendorf",7473:"Hannersdorf",7474:"Deutsch Sch\xfctzen",7501:"Rotenturm an der Pinka",7502:"Unterwart",7503:"Gro\xdfpetersdorf",7511:"Mischendorf",7512:"Kohfidisch",7521:"Eberau",7522:"Strem",7531:"Kemeten",7532:"Litzelsdorf",7533:"Ollersdorf im Burgenland",7534:"Olbendorf",7535:"St. Michael im Burgenland",7536:"G\xfcttenbach",7537:"Neuberg im Burgenland",7540:"G\xfcssing",7542:"Gerersdorf bei G\xfcssing",7543:"Kukmirn",7544:"Tobaj",7545:"Neustift bei G\xfcssing",7546:"Moschendorf",7550:"W\xf6rterberg",7551:"Stegersbach",7552:"Stinatz",7553:"Bocksdorf",7554:"Rohr im Burgenland",7561:"Heiligenkreuz im Lafnitztal",7562:"Eltendorf",7563:"K\xf6nigsdorf",7564:"Dobersdorf",7571:"Rudersdorf",7572:"Deutsch Kaltenbrunn",7574:"Burgauberg-Neudauberg",8010:"Graz",8020:"Graz",8036:"Graz",8041:"Graz-Liebenau",8042:"Graz-St. Peter",8043:"Graz-Kroisbach",8044:"Graz-Mariatrost",8045:"Graz-Andritz",8046:"Graz-St. Veit",8047:"Graz-Ragnitz",8051:"Graz-G\xf6sting",8052:"Graz-Wetzelsdorf",8053:"Graz-Neuhart",8054:"Graz-Stra\xdfgang",8055:"Graz-Puntigam",8061:"St. Radegund bei Graz",8062:"Kumberg",8063:"Eggersdorf bei Graz",8071:"Hausmannst\xe4tten",8072:"Fernitz",8073:"Feldkirchen bei Graz",8074:"Raaba",8075:"Hart bei Graz",8076:"Vasoldsberg",8077:"G\xf6ssendorf",8081:"Heiligenkreuz am Waasen",8082:"Kirchbach in Steiermark",8083:"St. Stefan im Rosental",8091:"Jagerberg",8092:"Mettersdorf am Sa\xdfbach",8093:"St. Peter am Ottersbach",8101:"Gratkorn",8102:"Semriach",8103:"Rein",8111:"Judendorf-Stra\xdfengel",8112:"Gratwein",8113:"St. Oswald bei Plankenwarth",8114:"St\xfcbing",8120:"Peggau",8121:"Deutschfeistritz",8122:"Waldstein",8124:"\xdcbelbach",8130:"Frohnleiten",8131:"Mixnitz",8132:"Pernegg an der Mur",8141:"Unterpremst\xe4tten",8142:"Wundschuh",8143:"Dobl",8144:"Tobelbad",8151:"Hitzendorf",8152:"Stallhofen",8153:"Geistthal",8160:"Weiz",8162:"Passail",8163:"Fladnitz an der Teichalm",8171:"St. Kathrein am Offenegg",8172:"Heilbrunn",8181:"St. Ruprecht an der Raab",8182:"Puch bei Weiz",8183:"Floing",8184:"Anger",8190:"Birkfeld",8191:"Koglhof",8192:"Strallegg",8200:"Gleisdorf",8211:"Ilztal",8212:"Pischelsdorf am Kulm",8221:"Hirnsdorf",8222:"St. Johann bei Herberstein",8223:"Stubenberg am See",8224:"Kaindorf bei Hartberg",8225:"P\xf6llau bei Hartberg",8230:"Hartberg",8232:"Grafendorf bei Hartberg",8233:"Lafnitz",8234:"Rohrbach an der Lafnitz",8240:"Friedberg",8241:"Dechantskirchen",8242:"St. Lorenzen am Wechsel",8243:"Pinggau",8244:"Sch\xe4ffern",8250:"Vorau",8251:"Bruck an der Lafnitz",8252:"M\xf6nichwald",8253:"Waldbach",8254:"Wenigzell",8255:"St. Jakob",8261:"Sinabelkirchen",8262:"Ilz",8263:"Gro\xdfwilfersdorf",8264:"Hainersdorf",8265:"Gro\xdfsteinbach",8271:"Bad Waltersdorf",8272:"Sebersdorf",8273:"Ebersdorf",8274:"Buch",8280:"F\xfcrstenfeld",8282:"Bad Loipersdorf",8283:"Bad Blumau",8291:"Burgau",8292:"Neudau",8293:"W\xf6rth an der Lafnitz",8294:"Unterrohr",8295:"St. Johann in der Haide",8301:"La\xdfnitzh\xf6he",8302:"Nestelbach bei Graz",8311:"Markt Hartmannsdorf",8312:"Ottendorf an der Rittschein",8313:"Breitenfeld an der Rittschein",8321:"St. Margarethen an der Raab",8322:"Studenzen",8323:"St. Marein bei Graz",8324:"Kirchberg an der Raab",8330:"Feldbach",8332:"Edelsbach bei Feldbach",8333:"Riegersburg",8334:"L\xf6dersdorf",8341:"Paldau",8342:"Gnas",8343:"Trautmannsdorf in Oststeiermark",8344:"Bad Gleichenberg",8345:"Straden",8350:"Fehring",8352:"Unterlamm",8353:"Kapfenstein",8354:"St. Anna am Aigen",8355:"Tieschen",8361:"Hatzendorf",8362:"S\xf6chau",8380:"Jennersdorf",8382:"Mogersdorf",8383:"St. Martin an der Raab",8384:"Minihof-Liebau",8385:"Neuhaus am Klausenbach",8401:"Kalsdorf bei Graz",8402:"Werndorf",8403:"Lebring",8410:"Wildon",8411:"Hengsberg",8412:"Allerheiligen bei Wildon",8413:"St. Georgen an der Stiefing",8421:"Wolfsberg im Schwarzautal",8422:"St. Nikolai ob Dra\xdfling",8423:"St. Veit am Vogau",8424:"Gabersdorf",8430:"Leibnitz",8431:"Gralla",8434:"Tillmitsch",8435:"Wagna",8441:"Fresing",8442:"Kitzeck im Sausal",8443:"Gleinst\xe4tten",8444:"St. Andr\xe4 im Sausal",8451:"Heimschuh",8452:"Gro\xdfklein",8453:"St. Johann im Saggautal",8454:"Arnfels",8455:"Oberhaag",8461:"Ehrenhausen",8462:"Gamlitz",8463:"Leutschach",8472:"Stra\xdf in Steiermark",8473:"Weitersfeld an der Mur",8480:"Mureck",8481:"Weinburg am Sa\xdfbach",8483:"Deutsch Goritz",8484:"Unterpurkla",8490:"Bad Radkersburg",8492:"Halbenrain",8493:"Kl\xf6ch",8501:"Lieboch",8502:"Lannach",8503:"St. Josef Weststeiermark",8504:"Preding",8505:"St. Nikolai im Sausal",8510:"Stainz",8511:"St. Stefan ob Stainz",8521:"Wettmannst\xe4tten",8522:"Gro\xdf St. Florian",8523:"Frauental an der La\xdfnitz",8524:"Bad Gams",8530:"Deutschlandsberg",8541:"Schwanberg",8542:"St. Peter im Sulmtal",8543:"St. Martin im Sulmtal",8544:"P\xf6lfing-Brunn",8551:"Wies",8552:"Eibiswald",8553:"St. Oswald ob Eibiswald",8554:"Soboth",8561:"S\xf6ding",8562:"Mooskirchen",8563:"Ligist",8564:"Krottendorf-Gaisfeld",8565:"St. Johann ob Hohenburg",8570:"Voitsberg",8572:"B\xe4rnbach",8573:"Kainach bei Voitsberg",8580:"K\xf6flach",8582:"Rosental an der Kainach",8583:"Edelschrott",8584:"Hirschegg",8591:"Maria Lankowitz",8592:"Salla",8593:"Graden",8600:"Bruck an der Mur",8605:"Kapfenberg",8611:"St. Katharein an der Laming",8612:"Trag\xf6\xdf-Oberort",8614:"Breitenau",8616:"Gasen",8621:"Th\xf6rl",8622:"Etmi\xdfl",8623:"Aflenz Kurort",8624:"Au",8625:"Turnau",8630:"Mariazell",8632:"Gu\xdfwerk",8634:"Wegscheid",8635:"Gollrad",8636:"Seewiesen",8641:"St. Marein im M\xfcrztal",8642:"St. Lorenzen im M\xfcrztal",8643:"Allerheiligen im M\xfcrztal",8644:"M\xfcrzhofen",8650:"Kindberg",8652:"Kindberg-Aum\xfchl",8653:"Stanz im M\xfcrztal",8654:"Fischbach",8661:"Wartberg im M\xfcrztal",8662:"Mitterdorf im M\xfcrztal",8663:"Dorf Veitsch",8664:"Gro\xdfveitsch",8665:"Langenwang",8670:"Krieglach",8671:"Alpl",8672:"St. Kathrein am Hauenstein",8673:"Ratten",8674:"Rettenegg",8680:"M\xfcrzzuschlag",8682:"M\xfcrzzuschlag-H\xf6nigsberg",8684:"Spital am Semmering",8685:"Steinhaus am Semmering",8691:"Kapellen",8692:"Neuberg an der M\xfcrz",8693:"M\xfcrzsteg",8694:"Frein an der M\xfcrz",8700:"Leoben",8712:"Niklasdorf",8713:"St. Stefan ob Leoben",8714:"Kraubath an der Mur",8715:"St. Lorenzen bei Knittelfeld",8720:"Knittelfeld",8723:"Kobenz",8724:"Spielberg",8731:"Bischoffeld",8732:"Seckau",8733:"St. Marein bei Knittelfeld",8734:"Gro\xdflobming",8740:"Zeltweg",8741:"Wei\xdfkirchen in Steiermark",8742:"Obdach",8750:"Judenburg",8753:"Fohnsdorf",8754:"Thalheim",8755:"St. Peter ob Judenburg",8756:"St. Georgen ob Judenburg",8761:"P\xf6ls",8762:"Oberzeiring",8763:"M\xf6derbrugg",8764:"Pusterwald",8765:"St. Johann am Tauern",8770:"St. Michael in Obersteiermark",8772:"Timmersdorf",8773:"Kammern im Liesingtal",8774:"Mautern in Steiermark",8775:"Kalwang",8781:"Wald am Schoberpa\xdf",8782:"Treglwang",8783:"Gaishorn am See",8784:"Trieben",8785:"Hohentauern",8786:"Rottenmann",8790:"Eisenerz",8792:"St. Peter-Freienstein",8793:"Trofaiach",8794:"Vordernberg",8795:"Radmer",8800:"Unzmarkt",8811:"Scheifling",8812:"Mariahof",8813:"St. Lambrecht",8820:"Neumarkt in Steiermark",8822:"M\xfchlen",8831:"Niederw\xf6lz",8832:"Oberw\xf6lz",8833:"Teufenbach",8841:"Frojach",8842:"Katsch an der Mur",8843:"St. Peter am Kammersberg",8844:"Sch\xf6der",8850:"Murau",8852:"Stolzalpe",8853:"Ranten",8854:"Krakaudorf",8861:"St. Georgen ob Murau",8862:"Stadl an der Mur",8863:"Predlitz",8864:"Turrach",8900:"Selzthal",8903:"Lassing",8904:"Ardning",8911:"Admont",8912:"Johnsbach",8913:"Weng",8920:"Hieflau",8921:"Lainbach",8922:"Gams bei Hieflau",8923:"Palfau",8924:"Wildalpen",8931:"Landl",8932:"Wei\xdfenbach an der Enns",8933:"St. Gallen",8934:"Altenmarkt bei St. Gallen",8940:"Liezen",8942:"W\xf6rschach",8943:"Aigen im Ennstal",8950:"Stainach",8951:"Trautenfels",8952:"Irdning",8953:"Donnersbach",8954:"St. Martin am Grimming",8960:"\xd6blarn",8961:"Stein an der Enns",8962:"Gr\xf6bming",8965:"Pruggern",8966:"Aich-Assach",8967:"Haus",8970:"Schladming",8971:"Rohrmoos-Untertal",8972:"Ramsau",8973:"Pichl",8974:"Mandling",8982:"Tauplitz",8983:"Bad Mitterndorf",8984:"Kainisch",8990:"Bad Aussee",8992:"Altaussee",8993:"Grundlsee",9020:"Klagenfurt am W\xf6rthersee",9061:"Klagenfurt-W\xf6lfnitz",9062:"Moosburg",9063:"Maria Saal",9064:"Pischeldorf",9065:"Ebenthal",9071:"K\xf6ttmannsdorf",9072:"Ludmannsdorf",9073:"Klagenfurt-Viktring",9074:"Keutschach",9081:"Reifnitz",9082:"Maria W\xf6rth",9100:"V\xf6lkermarkt",9102:"Mittertrixen",9103:"Diex",9111:"Haimburg",9112:"Griffen",9113:"Ruden",9121:"Tainach",9122:"St. Kanzian am Klopeiner See",9123:"St. Primus",9125:"K\xfchnsdorf",9130:"Poggersdorf",9131:"Grafenstein",9132:"Gallizien",9133:"Sittersdorf",9135:"Bad Eisenkappel",9141:"Eberndorf",9142:"Globasnitz",9143:"St. Michael ob Bleiburg",9150:"Bleiburg",9155:"Neuhaus",9161:"Maria Rain",9162:"Strau",9163:"Unterbergen",9170:"Ferlach",9173:"St. Margareten im Rosental",9181:"Feistritz im Rosental",9182:"Maria Elend",9183:"Rosenbach",9184:"St. Jakob im Rosental",9201:"Krumpendorf",9210:"P\xf6rtschach am W\xf6rther See",9212:"Techelsberg am W\xf6rther See",9220:"Velden am W\xf6rther See",9231:"K\xf6stenberg",9232:"Rosegg",9241:"Wernberg",9300:"St. Veit an der Glan",9311:"Kraig",9312:"Meiselding",9313:"St. Georgen am L\xe4ngsee",9314:"Launsdorf",9321:"Kappel am Krappfeld",9322:"Micheldorf",9323:"Wildbad Ein\xf6d",9330:"Treibach-Althofen",9334:"Guttaring",9335:"L\xf6lling",9341:"Stra\xdfburg",9342:"Gurk",9343:"Zweinitz",9344:"Weitensfeld",9345:"Kleingl\xf6dnitz",9346:"Gl\xf6dnitz",9360:"Friesach",9361:"St. Salvator",9362:"Grades",9363:"Metnitz",9371:"Br\xfcckl",9372:"Eberstein",9373:"Klein St. Paul",9374:"Wieting",9375:"H\xfcttenberg",9376:"Knappenberg",9400:"Wolfsberg",9411:"St. Michael",9412:"St. Margarethen im Lavanttal",9413:"St. Gertraud",9421:"Eitweg",9422:"Maria Rojach",9423:"St. Georgen",9431:"St. Stefan",9433:"St. Andr\xe4",9441:"Twimberg",9451:"Preitenegg",9461:"Prebl",9462:"Bad St. Leonhard im Lavanttal",9463:"Reichenfels",9470:"St. Paul im Lavanttal",9472:"Ettendorf",9473:"Lavam\xfcnd",9500:"Villach",9504:"Villach-Warmbad Villach",9520:"Sattendorf",9521:"Treffen",9523:"Villach-Landskron",9524:"Villach-St. Magdalen",9530:"Bad Bleiberg",9531:"Kreuth",9535:"Schiefling am W\xf6rthersee",9536:"St. Egyden",9541:"Ein\xf6de",9542:"Afritz",9543:"Arriach",9544:"Feld am See",9545:"Radenthein",9546:"Bad Kleinkirchheim",9551:"Bodensdorf",9552:"Steindorf am Ossiacher See",9554:"St. Urban",9555:"Glanegg",9556:"Liebenfels",9560:"Feldkirchen in K\xe4rnten",9562:"Himmelberg",9563:"Gnesau",9564:"Patergassen",9565:"Ebene Reichenau",9570:"Ossiach",9571:"Sirnitz",9572:"Deutsch Griffen",9580:"Villach-Drobollach am Faaker See",9581:"Ledenitzen",9582:"Latschach",9583:"Faak am See",9584:"Finkenstein",9585:"G\xf6dersdorf",9586:"F\xfcrnitz",9587:"Riegersdorf",9601:"Arnoldstein",9602:"Th\xf6rl-Maglern",9611:"N\xf6tsch",9612:"St. Georgen im Gailtal",9613:"Feistritz an der Gail",9614:"Vorderberg",9615:"G\xf6rtschach",9620:"Hermagor",9622:"Wei\xdfbriach",9623:"St. Stefan an der Gail",9624:"Egg",9631:"Jenig",9632:"Kirchbach",9633:"Reisach",9634:"Gundersheim",9635:"Dellach",9640:"K\xf6tschach-Mauthen",9651:"St. Jakob im Lesachtal",9652:"Birnbaum",9653:"Liesing",9654:"St. Lorenzen im Lesachtal",9655:"Maria Luggau",9701:"Rothenthurn",9702:"Ferndorf",9710:"Feistritz an der Drau",9711:"Paternion",9712:"Fresach",9713:"Zlan",9714:"Stockenboi",9721:"Wei\xdfenstein",9722:"Gummern",9751:"Sachsenburg",9753:"Lind im Drautal",9754:"Steinfeld",9761:"Greifenburg",9762:"Wei\xdfensee",9771:"Berg im Drautal",9772:"Dellach",9773:"Irschen",9781:"Oberdrauburg",9782:"Nikolsdorf",9800:"Spittal an der Drau",9805:"Baldramsdorf",9811:"Lendorf",9812:"Pusarnitz",9813:"M\xf6llbr\xfccke",9814:"M\xfchldorf",9815:"Kolbnitz",9816:"Penk",9821:"Obervellach",9822:"Mallnitz",9831:"Flattach",9832:"Stall",9833:"Rangersdorf",9841:"Winklern",9842:"M\xf6rtschach",9843:"Gro\xdfkirchheim",9844:"Heiligenblut",9851:"Lieserbr\xfccke",9852:"Trebesing",9853:"Gm\xfcnd",9854:"Malta",9861:"Eisentratten",9862:"Kremsbr\xfccke",9863:"Rennweg",9871:"Seeboden",9872:"Millstatt am See",9873:"D\xf6briach",9900:"Lienz",9903:"Oberlienz",9904:"Thurn",9905:"Gaimberg",9906:"Lavant",9907:"Tristach",9908:"Amlach",9909:"Leisach",9911:"Assling",9912:"Anras",9913:"Abfaltersbach",9918:"Strassen",9919:"Heinfels",9920:"Sillian",9931:"Au\xdfervillgraten",9932:"Innervillgraten",9941:"Kartitsch",9942:"Obertilliach",9943:"Untertilliach",9951:"Ainet",9952:"St. Johann im Walde",9954:"Schlaiten",9961:"Hopfgarten in Defereggen",9962:"St. Veit in Defereggen",9963:"St. Jakob in Defereggen",9971:"Matrei in Osttirol",9972:"Virgen",9974:"Pr\xe4graten",9981:"Kals",9990:"Nu\xdfdorf-Debant",9991:"D\xf6lsach",9992:"Iselsberg-Stronach"};document.getElementById("zipcode").addEventListener("input",function(){var e=zipToCity[this.value];e&&(document.getElementById("city").value=e)});
</script>
<script>
  // IBAN Validity Check
document.addEventListener('DOMContentLoaded', function() {
  var ibanInput = document.getElementById('iban');

  // Austrian IBAN validation function
  function validateAustrianIBAN(iban) {
    // Replace spaces and to upper case
    iban = iban.replace(/\s/g, '').toUpperCase();
    
    // Austrian IBAN should start with 'AT' followed by 18 digits
    var isValid = /^AT\d{18}$/.test(iban);

    return isValid;
  }

  // Real-time validity check on input
  ibanInput.addEventListener('input', function() {
    if (validateAustrianIBAN(this.value)) {
      // If the IBAN is valid, you can change the border color to green or hide error message
      this.style.borderColor = 'green';
      this.style.color = 'black'; // or any color indicating 'valid'
    } else {
      // If the IBAN is not valid, you can change the border color to red or show an error message
      this.style.borderColor = 'red';
      this.style.color = 'red'; // or any color indicating 'invalid'
    }
  });
});
</script>
<script>
  // BIC Validity Check
document.addEventListener('DOMContentLoaded', function() {
  var bicInput = document.getElementById('bic');

  // Austrian BIC validation function
  function validateAustrianBIC(bic) {
    // BIC should be either 8 or 11 characters long, uppercase, and for Austria, it should have 'AT' as the country code
    var isValid = /^[A-Z]{4}AT[A-Z2-9][A-NP-Z0-9](XXX|[\dA-Z]{3})?$/.test(bic.toUpperCase());

    return isValid;
  }

  // Real-time validity check on input
  bicInput.addEventListener('input', function() {
    if (validateAustrianBIC(this.value)) {
      // If the BIC is valid, you can change the border color to green or hide error message
      this.style.borderColor = 'green';
      this.style.color = 'black'; // or any color indicating 'valid'
    } else {
      // If the BIC is not valid, you can change the border color to red or show an error message
      this.style.borderColor = 'red';
      this.style.color = 'red'; // or any color indicating 'invalid'
    }
  });
});
</script>



@endsection
