
<body>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="padding-left: 188pt;text-indent: 0pt;text-align: left;"><span
            style=" color: #A5A5A5; font-family:Verdana, sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 15.5pt;">Vergleichsangebot
            Strom</span></p>
    <p style="padding-left: 5pt;text-indent: 0pt;text-align: left;"><span>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                    </td>
                </tr>
            </table>
        </span></p>


    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>

    <td style="width:81pt">
        <p class="s3" style="padding-left: 9pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
          <strong></strong>
        </p>
    </td>
    <form >
    <table style="border-collapse:collapse;margin-left:11.82pt" cellspacing="0" id="userDetails">
        <tr style="height:13pt">
            <td style="width:50pt">
                <p class="s1" style="padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;">Name:</p>
            </td>
            <td style="width:167pt">
                <p class="s2" style="padding-left: 10pt;text-indent: 0pt;line-height: 11pt;text-align: left;"></p>
            </td>
            <td style="width:153pt">
                <p class="s1" style="padding-left: 68pt;text-indent: 0pt;line-height: 10pt;text-align: left;">
                    Kundennummer:</p>
            </td>
            <td style="width:81pt">
                <p class="s3" style="padding-left: 9pt;text-indent: 0pt;line-height: 11pt;text-align: left;"></p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:50pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">Strasse:</p>
            </td>
            <td style="width:167pt">
                <p class="s3" style="padding-left: 10pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                    </p>
            </td>
            <td style="width:153pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 68pt;text-indent: 0pt;text-align: left;">Email</p>
            </td>
            <td style="width:81pt">
                <p class="s3" style="padding-left: 9pt;text-indent: 0pt;line-height: 13pt;text-align: left;"></p>
            </td>
        </tr>
        <tr style="height:13pt">
            <td style="width:50pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 2pt;text-indent: 0pt;text-align: left;">PLZ &amp;
                    Ort:</p>
            </td>
            <td style="width:167pt">
                <p class="s3" style="padding-left: 10pt;text-indent: 0pt;line-height: 12pt;text-align: left;"></p>
            </td>
            <td style="width:153pt">
                <p class="s1" style="padding-top: 1pt;padding-left: 68pt;text-indent: 0pt;text-align: left;">
                    Angebotsnummer:</p>
            </td>
            <td style="width:81pt">
                <p class="s3" style="padding-left: 9pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                </p>
            </td>
        </tr>
    </table>
    
</form>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <table style="border-collapse:collapse;margin-left:70.24pt" cellspacing="0">
        <tr style="height:15pt">
            <td style="width:204pt" bgcolor="#D8D8D8">
                <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 13pt;text-align: left;">Bestehender
                    Vertrag</p>
            </td>
            <td style="width:245pt" colspan="3" bgcolor="#D8D8D8">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
        </tr>
        <tr style="height:16pt">
            <td style="width:204pt">
                <p class="s3" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">Gesamtverbrauch</p>
            </td>
            <td style="width:120pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:58pt">
                <p class="s4" style="padding-top: 2pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">{{isset($data['stromverbrauch']) ? $data['stromverbrauch']:'--'}} kWh</p>
            </td>
            <td style="width:67pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;text-align: right;"><!-- pass kwh from form --></p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:204pt">
                <p class="s3" style="padding-left: 1pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                    Energiepreis pro kWh</p>
            </td>
            <td style="width:120pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:58pt">
                <p class="s4" style="padding-top: 1pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">
                  {{isset($data['old_stromkosten']) ? $data['old_stromkosten']:'--'}} ct/ kWh</p>
            </td>
            <td style="width:67pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;line-height: 13pt;text-align: right;"><!-- pass kwhpreis from form--></p>
            </td>
        </tr>
        <tr style="height:13pt">
            <td style="width:204pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 1pt;text-indent: 0pt;line-height: 12pt;text-align: left;">Grundpreis
                    pro Monat</p>
            </td>
            <td style="width:120pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:58pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 16pt;text-indent: 0pt;line-height: 12pt;text-align: left;">{{isset($data['old_grundpreis']) ? $data['old_grundpreis']:'--'}} €</p>
            </td>
            <td style="width:67pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;line-height: 12pt;text-align: right;"><!-- pass grundpreis from form --></p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:204pt;border-top-style:solid;border-top-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:120pt;border-top-style:solid;border-top-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:58pt;border-top-style:solid;border-top-width:1pt">
                <p class="s3" style="padding-left: 16pt;text-indent: 0pt;text-align: left;"></p>
            </td>
            <td style="width:67pt;border-top-style:solid;border-top-width:1pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;text-align: right;"><!-- kwh*kwhpreis+grundpreis--></p>
            </td>
        </tr>
        <tr style="height:13pt">
            <td style="width:204pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:120pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 74pt;text-indent: 0pt;line-height: 12pt;text-align: left;">20% Ust.
                </p>
            </td>
            <td style="width:58pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 16pt;text-indent: 0pt;line-height: 12pt;text-align: left;"> </p>
            </td>
            <td style="width:67pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;line-height: 12pt;text-align: right;"><!-- 20% from that above -->
                </p>
            </td>
        </tr>
        <tr style="height:13pt">
            <td
                style="width:204pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
                    Referenzpreis inkl. Ust. - ALT</p>
            </td>
            <td
                style="width:120pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td
                style="width:58pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 16pt;text-indent: 0pt;line-height: 11pt;text-align: left;">{{isset($data['tax']) ? $data['tax']:'--'}}€</p>
            </td>
            <td
                style="width:67pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;line-height: 11pt;text-align: right;"><!-- add the 2 prices from above together -->
                </p>
            </td>
        </tr>
    </table>

    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <table style="border-collapse:collapse;margin-left:70.24pt" cellspacing="0">
        <tr style="height:15pt">
            <td style="width:206pt" bgcolor="#A7F05D">
                <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 13pt;text-align: left;"><!-- Tariff Name --></p>
            </td>
            <td style="width:243pt" colspan="3" bgcolor="#A7F05D">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
        </tr>
        <tr style="height:16pt">
            <td style="width:206pt">
                <p class="s3" style="padding-left: 1pt;text-indent: 0pt;text-align: left;">Gesamtverbrauch</p>
            </td>
            <td style="width:118pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:58pt">
                <p class="s4" style="padding-top: 2pt;padding-left: 11pt;text-indent: 0pt;text-align: left;">{{isset($data['stromverbrauch']) ? $data['stromverbrauch']:'--'}} kWh</p>
            </td>
            <td style="width:67pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;text-align: right;"> <!-- pass kwh from form --></p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:206pt">
                <p class="s3" style="padding-left: 1pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                    Energiepreis pro kWh</p>
            </td>
            <td style="width:118pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:58pt">
                <p class="s4" style="padding-top: 1pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">{{isset($data['preis']) ? $data['preis']:'--'}} ct/ kWh</p>
            </td>
            <td style="width:67pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;line-height: 13pt;text-align: right;"><!-- get kwhprice from tariff --></p>
            </td>
        </tr>
        <tr style="height:13pt">
            <td style="width:206pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 1pt;text-indent: 0pt;line-height: 12pt;text-align: left;">Grundpreis
                    pro Monat</p>
            </td>
            <td style="width:118pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:58pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 16pt;text-indent: 0pt;line-height: 12pt;text-align: left;">{{isset($data['grundpreis']) ? $data['grundpreis']:'--'}} €</p>
            </td>
            <td style="width:67pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;line-height: 12pt;text-align: right;"><!-- get grundpreis from tariff --></p>
            </td>
        </tr>
        <tr style="height:15pt">
            <td style="width:206pt;border-top-style:solid;border-top-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:118pt;border-top-style:solid;border-top-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:58pt;border-top-style:solid;border-top-width:1pt">
                <p class="s3" style="padding-left: 16pt;text-indent: 0pt;text-align: left;"></p>
            </td>
            <td style="width:67pt;border-top-style:solid;border-top-width:1pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;text-align: right;"><!-- values above kwh*kwhpreis+grundpreis --></p>
            </td>
        </tr>
        <tr style="height:13pt">
            <td style="width:206pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td style="width:118pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 72pt;text-indent: 0pt;line-height: 12pt;text-align: left;">20% Ust.
                </p>
            </td>
            <td style="width:58pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 16pt;text-indent: 0pt;line-height: 12pt;text-align: left;"></p>
            </td>
            <td style="width:67pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;line-height: 12pt;text-align: right;"><!-- get 20% from value above-->
                </p>
            </td>
        </tr>
        <tr style="height:13pt">
            <td
                style="width:206pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s2" style="padding-left: 1pt;text-indent: 0pt;line-height: 11pt;text-align: left;">
                    Referenzpreis inkl. Ust. - NEU</p>
            </td>
            <td
                style="width:118pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;"><br /></p>
            </td>
            <td
                style="width:58pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-left: 16pt;text-indent: 0pt;line-height: 11pt;text-align: left;">{{isset($data['subtax']) ? $data['subtax']:'--'}}€</p>
            </td>
            <td
                style="width:67pt;border-top-style:solid;border-top-width:1pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p class="s3" style="padding-right: 2pt;text-indent: 0pt;line-height: 11pt;text-align: right;"><!-- price with the 20% from above -->
                </p>
            </td>
        </tr>
    </table>

    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="text-indent: 0pt;line-height: 12pt;text-align: left;"><span
            style=" color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 11.5pt;">Einsparungspotential</span>
    </p>
    <p style="text-indent: 0pt;line-height: 12pt;text-align: left;"><span
            style=" color: black; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 11.5pt;"><!-- old price - new price --></span>
    </p>
    <p style="padding-left: 70pt;text-indent: 0pt;text-align: left;" />
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p style="padding-top: 3pt;padding-left: 14pt;text-indent: 0pt;text-align: left;">Das Einsparungspotential ergibt
        sich aus dem Arbeitspreis.</p>
    <p style="padding-top: 2pt;padding-left: 14pt;text-indent: 0pt;line-height: 123%;text-align: left;">Netzgebühren und
        gesetzliche Abgaben bleiben unverändert und sind in o.a. Angaben nicht enthalten. Basierend auf dem Preisblatt
        der E1 Erste Energie: Referenzwert Dezember 2023</p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    </p>






