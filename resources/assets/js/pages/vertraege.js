const { PDFDocument } = PDFLib;

const IVertraegeList = VertraegeList();
const ICreateContract = CreateContract();
const IVertraegeAdd = VertraegeAdd();
const IVertraegeEdit = VertraegeEdit();
const IVertraegeSignature = VertraegeSignature();
const IVertraegePdfRender = VertraegePdfRender();
// var resultTable = document.getElementById("result-table");
// var stromCard = document.getElementById("card-strom");
let INTERN = true;
let provArray = [];
let moProvArray = [];
let tarifArray = [];

$(document).ready(function () {
  if ($('#wrapper_vertraege_list').length > 0) {
    IVertraegeList.init();
  }

  if ($('#wrapper_create_contract').length > 0) {
    ICreateContract.init();
  }

  if ($('#wrapper_vertraege_add').length > 0) {
    IVertraegeAdd.init();
  }

  if ($('#wrapper_vertraege_update').length > 0) {
    IVertraegeEdit.init();
  }

  if ($('#wrapper_pdf_render').length > 0) {
    IVertraegePdfRender.init();
  }

  if ($('#wrapper_pdf_signature').length > 0) {
    IVertraegeSignature.init();
  }
});

function VertraegeList() {
  return {
    init: function () {
      $('#vertragTable').DataTable();
    }
  }
}

function VertraegeAdd() {
  return {
    init: function () {
      let i = 1;
      $('#add').click(function () {
        i++;
        $('#dynamic_field').append('<div id="row'+i+'" class="dynamic-added py-3"><div class="row"> <div class="form-group col-md-5"><label for="zpn">Zählpunktnummer:</label><input type="text" name="zpn[]" id="zpn" class="form-control"></div><div class="form-group col-md-5"><label for="anummer">Anlagennummer:</label><input type="text" name="anummer[]" id="anummer" class="form-control"></div><div class = "col-md-1"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove m-3">X</button></div><div></div>');
      });

      $('.btn_remove').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        const button_id = $(this).attr('id');
        $(`#row${button_id}`).remove();
      });

      $('#userDropdown').select2({
        placeholder: 'Bitte eine Option whlen',
        allowClear: true,
      });

      $('#userDropdown').change(function () {
        let selectedUserId = $(this).val();
        $('#userData').show();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        // Make an AJAX request to fetch user data
        $.ajax({
          url: '/get-user-data', // Replace this URL with the actual route to fetch user data
          method: 'post',
          data: {
            userId: selectedUserId,
          },
          success: function (data) {
            // Populate the user data in the userDataContainer
            console.log('success');
            $('#customerStreet').val(data.street);
            $('#customerHN').val(data.house_number);
            $('#customerTelephone').val(data.tel_number);
            $('#customerStairs').val(data.stairs);
            $('#customerDoor').val(data.door);
            $('#customerLocation').val(data.location);
            $('#customerEmail').val(data.email);
            $('#customerPostcode').val(data.postcode);

            $('#diff_street').val(data.diff_street);
            $('#diff_house_number').val(data.diff_house_number);
            $('#diff_stairs').val(data.diff_stairs);
            $('#diff_door').val(data.diff_door);
            $('#diff_location').val(data.diff_location);
            $('#diff_postcode').val(data.diff_postcode);
          },
          error: function (xhr, status, error) {
            console.log(error);
          }
        });
      });
    }
  };
}

function VertraegeEdit() {
  return {
    init: function () {
      let i = 1;
      $('#add').click(function () {
        i++;
        $('#dynamic_field').append('<div id="row'+i+'" class="dynamic-added py-3"><div class="row"> <div class="form-group col-md-5"><label for="zpn">Zählpunktnummer:</label><input type="text" name="zpn[]" id="zpn" class="form-control"></div><div class="form-group col-md-5"><label for="anummer">Anlagennummer:</label><input type="text" name="anummer[]" id="anummer" class="form-control"></div><div class = "col-md-1"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove m-3">X</button></div><div></div>');
      });

      $('.btn_remove').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        let button_id = $(this).attr('id');
        $('#row' + button_id).remove();
      });

      $('userDropdown').select2({
        placeholder: 'Bitte eine Option whlen',
        allowClear: true,
      });

      $('#userDropdown').change(function() {
        let selectedUserId = $(this).val();
        $('#userData').show();

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        // Make an AJAX request to fetch user data
        $.ajax({
          url: '/get-user-data', // Replace this URL with the actual route to fetch user data
          method: 'post',
          data: {
            userId: selectedUserId,
          },
          success: function(data) {
            // Populate the user data in the userDataContainer
            console.log('success');
            $('#customerStreet').val(data.street);
            $('#customerHN').val(data.house_number);
            $('#customerTelephone').val(data.tel_number);
            $('#customerStairs').val(data.stairs);
            $('#customerDoor').val(data.door);
            $('#customerLocation').val(data.location);
            $('#customerEmail').val(data.email);
            $('#customerPostcode').val(data.postcode);

            $('#diff_street').val(data.diff_street);
            $('#diff_house_number').val(data.diff_house_number);
            $('#diff_stairs').val(data.diff_stairs);
            $('#diff_door').val(data.diff_door);
            $('#diff_location').val(data.diff_location);
            $('#diff_postcode').val(data.diff_postcode);

          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      });
    }
  };
}

function VertraegeSignature() {
  let signaturePad;
  let canvas;

  return {
    init: function() {
      IVertraegeSignature.pdfRender();

      canvas = document.querySelector('canvas');
      signaturePad = new SignaturePad(canvas, {
        // It's Necessary to use an opaque color when saving image as JPEG;
        // this option can be omitted if only saving as PNG or SVG
        backgroundColor: 'rgb(255, 255, 255)'
      });

      window.onresize = IVertraegeSignature.resizeCanvas;
      IVertraegeSignature.resizeCanvas();

      $('#btn_clear').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        signaturePad.clear();
      });

      $('#btn_change_color').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        const r = Math.round(Math.random() * 255);
        const g = Math.round(Math.random() * 255);
        const b = Math.round(Math.random() * 255);
        const color = "rgb(" + r + "," + g + "," + b +")";

        signaturePad.penColor = color;
      });

      $('#btn_undo').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        const data = signaturePad.toData();

        if (data) {
          data.pop(); // remove the last dot or line
          signaturePad.fromData(data);
        }
      });

      $('#btn_save_png').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        IVertraegeSignature.save().catch(e => console.log(e));
      });
    },

    pdfRender: async function () {
      const formPdfBytes = await fetch(pdfUrl).then(res => res.arrayBuffer());
      const pdfDoc = await PDFDocument.load(formPdfBytes);

      let pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
      const blob = dataURItoBlob(pdfDataUri);
      const file = new File([blob], vertraege.id + '.pdf', { type: 'application/pdf', lastModified:new Date().getTime() });
      const container = new DataTransfer();
      container.items.add(file);
      const fileElement = document.querySelector('INPUT[name=vertraege_unsigned_pdf]');
      fileElement.files = container.files;

      const form = pdfDoc.getForm();
      form.flatten();

      pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
      $('#pdf').attr('src', pdfDataUri);
    },

    save: async function () {
      if (signaturePad.isEmpty()) {
        alert("Please provide a signature first.");
        return;
      }

      const formPdfBytes = await fetch(pdfUrl).then(res => res.arrayBuffer());
      const pdfDoc = await PDFDocument.load(formPdfBytes);
      const form = pdfDoc.getForm();

      const signatureDataURL = signaturePad.toDataURL('image/png');
      // const dataURL = signaturePad.toDataURL('image/jpeg');
      // const dataURL = signaturePad.toDataURL('image/svg+xml');
      const signatureBytes = signatureDataURL.replace('data:', '').replace(/^.+,/, '');

      const signatureImage = await pdfDoc.embedPng(signatureBytes);
      form.getTextField('Ort/Datum').setImage(signatureImage);

      form.flatten();

      let pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
      const blob = dataURItoBlob(pdfDataUri);
      const file = new File([blob], vertraege.id + '.pdf', { type: 'application/pdf', lastModified:new Date().getTime() });
      const container = new DataTransfer();
      container.items.add(file);
      const fileElement = document.querySelector('INPUT[name=vertraege_signed_pdf]');
      fileElement.files = container.files;

      $('#frm_save_pdf').submit();
    },
    resizeCanvas: function () {
      // When zoomed out to less than 100%, for some very strange reason,
      // some browsers report devicePixelRatio as less than 1
      // and only part of the canvas is cleared then.
      let ratio =  Math.max(window.devicePixelRatio || 1, 1);

      // This part causes the canvas to be cleared
      canvas.width = canvas.offsetWidth * ratio;
      canvas.height = canvas.offsetHeight * ratio;
      canvas.getContext("2d").scale(ratio, ratio);

      // This library does not listen for canvas changes, so after the canvas is automatically
      // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
      // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
      // that the state of this library is consistent with visual state of the canvas, you
      // have to clear it manually.
      signaturePad.clear();
    },
  }
}

function dataURItoBlob(dataURI) {
  // convert base64/URLEncoded data component to raw binary data held in a string
  var byteString;
  if (dataURI.split(',')[0].indexOf('base64') >= 0)
    byteString = atob(dataURI.split(',')[1]);
  else
    byteString = unescape(dataURI.split(',')[1]);

  // separate out the mime component
  var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

  // write the bytes of the string to a typed array
  var ia = new Uint8Array(byteString.length);
  for (var i = 0; i < byteString.length; i++) {
    ia[i] = byteString.charCodeAt(i);
  }

  return new Blob([ia], {type:mimeString});
}

function VertraegePdfRender() {
  return {
    init: function () {
      IVertraegePdfRender.pdfRender();
    },

    pdfRender: async function () {
      function getDBValue(data, field, type, value) {
        if (type === 'text') {
          return data[field];
        }

        if (type === '[text]') {
          let v = data[field];
          try {
            let o = JSON.parse(v);
            if (o.length > value) {
              return o[value];
            }
          } catch {}
        }

        if (type === 'enum') {
          let v = data[field];
          return v == value;
        }
      }
      function parseField(fieldInfo) {
        if (!fieldInfo || fieldInfo.length === 0) return '';

        let fields = fieldInfo.split(',');
        let arr = [];
        for (let i = 0; i < fields.length; i++) {
          let field = fields[i];
          if (!field || field.length === 0) continue;

          let tableName = '', tableField = '', tableFieldType = '', tableFieldValue = '';
          let t = field.split('-');
          tableName = t[0];
          tableField = t[1];
          tableFieldType = t[2];
          if (t.length > 3) {
            tableFieldValue = t[3];
          }

          if (tableName === 'tarife') {
            let v = getDBValue(tarife, tableField, tableFieldType, tableFieldValue);
            if (v) {
              arr.push(v);
            }
          }

          if (tableName === 'kundens') {
            let v = getDBValue(kunden, tableField, tableFieldType, tableFieldValue);
            if (v) {
              arr.push(v);
            }
          }

          if (tableName === 'vertraege') {
            let v = getDBValue(vertraege, tableField, tableFieldType, tableFieldValue);
            if (v) {
              arr.push(v);
            }
          }
        }

        return arr.join(' ');
      }

      let jsonFields = [];
      try  {
        jsonFields = JSON.parse(tarife.fields);
      } catch (e) { console.log(e); }

      
      const formPdfBytes = await fetch(pdfUrl).then(res => res.arrayBuffer());
      const pdfDoc = await PDFDocument.load(formPdfBytes);
      const form = pdfDoc.getForm();
      jsonFields.forEach(v => {
        if (v.type === 'PDFTextField') {
          //console.log(v.name)
          if(v.name!="Zählernummer"){
            let pdfField = form.getTextField(v.name);
            let value = parseField(v.fields);
            pdfField.setText(value);
          }
          
        }

        if (v.type === 'PDFCheckBox') {
          let pdfField = form.getCheckBox(v.name);
          let value = parseField(v.fields);
          if (value === 'true') {
            pdfField.check();
          } else {
            pdfField.uncheck();
          }
        }
      });

      let pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });

      const blob = dataURItoBlob(pdfDataUri);
      const file = new File([blob], vertraege.id + '.pdf', { type: 'application/pdf', lastModified:new Date().getTime() });
      const container = new DataTransfer();
      container.items.add(file);
      const fileElement = document.querySelector('INPUT[name=vertraege_unsigned_pdf]');
      fileElement.files = container.files;

      // =================================
      form.flatten();
      // const pages = pdfDoc.getPages();
      // download(pdfBytes, "test.pdf", "application/pdf");
      pdfDataUri = await pdfDoc.saveAsBase64({ dataUri: true });
      $('#pdf').attr('src', pdfDataUri);
    }
  };
}

function CreateContract() {
  return {
    init: function () {
      if (window.location.hash) {
        const hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
        if (hash === 'TIPINTERN') {
          INTERN = true;
          $('#provtablewrapper-INTERN').hide();
        }
        // hash found
      } else {
        // No hash found
      }

      $('.tab-label.tab1').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        ICreateContract.showTab('tab1');
      });

      $('.tab-label.tab2').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        ICreateContract.showTab('tab2');
      });

      $('#tab1 #calcProvBtn').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        ICreateContract.Calcprov('strom');
      });

      $('#tab2 #calcProvBtn').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        ICreateContract.Calcprov('gas');
      });

      $('#tab1 #calculate-button').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        ICreateContract.loadAndCalculateTariffs('strom');
        ICreateContract.showTarifeList('strom');
      });

      $('#tab2 #calculate-button').click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        ICreateContract.loadAndCalculateTariffs('gas');
        ICreateContract.showTarifeList('gas');
      });

      ICreateContract.nextField('stromverbrauch', 'old_stromkosten');
      ICreateContract.nextField('old_stromkosten', 'old_grundpreis');
      ICreateContract.nextField('old_grundpreis', 'ZPNum');
      ICreateContract.nextField('ZPNum');
      ICreateContract.showTab('tab1');
    },

    showTab: function (tabId) {
      $('#tarifes #cards').html('');
      $('.tab-content').hide();
      $('.tab-label').removeClass('active');
      $(`#${tabId}`).show();
      $(`.tab-label.${tabId}`).addClass('active');

      if (tabId === 'tab1') {
        $('#tarifes button[type=submit]').html('Create Contract For Strom');
        $('#tarifes input[name=type]').val('strom');
        ICreateContract.loadAndCalculateTariffs('strom');
        ICreateContract.showTarifeList('strom');
      } else {
        $('#tarifes button[type=submit]').html('Create Contract For Gas');
        $('#tarifes input[name=type]').val('gas');
        ICreateContract.loadAndCalculateTariffs('gas');
        ICreateContract.showTarifeList('gas');
      }
    },

    getContractMetaData: function (type) {
      let verbrauch = type === 'strom' ? new Decimal($('#stromverbrauch').val()) : new Decimal($('#stromverbrauchGas').val());
      let old_stromkosten1 = type === 'strom' ? new Decimal($('#old_stromkosten').val()) : new Decimal($('#old_stromkostenGas').val());
      let old_stromkosten = old_stromkosten1.div(100);
      let old_grundpreis = type === 'strom' ? new Decimal($('#old_grundpreis').val()) : new Decimal($('#old_grundpreisGas').val());
      let ZP = type === 'strom' ? new Decimal($('#ZPNum').val()) : new Decimal($('#ZPNumGas').val());
      let preis_alt = verbrauch.times(old_stromkosten).plus(old_grundpreis.times(ZP));
      const response =  type === 'strom' ? $('#tarife_data_strom').val() : $('#tarife_data_gas').val();
      return { verbrauch, ZP, preis_alt, response };
    },

    showTarifeList: function (type) {
      let { verbrauch, ZP, preis_alt, response } = ICreateContract.getContractMetaData(type);
      $('#tarifes #cards').html('');
      try {
        const data = JSON.parse(response);
        const tariffs = data.Tarife;
        const boerse = new Decimal(data.FixedVal.Boerse);
        const AufschlagE1 = new Decimal(data.FixedVal.AufschlagE1);

        for (let val in tariffs) {
          if (tariffs.hasOwnProperty(val)) {
            const tariff = tariffs[val];
            const name = val;
            const firma = tariff.firma;
            const contractID = tariff.id;
            const tarpreis = new Decimal(tariff.preis);
            const grundpreis = new Decimal(tariff.grundpreis);
            const type = tariff.type;
            const contracttype = tariff.contract_type;
            const prov = new Decimal(tariff.prov);
            const result = grundpreis * boerse;

            const tariffPrice = (type === 'Flex') ? tarpreis.plus(boerse).plus(AufschlagE1) : tarpreis;
            const HandlingFee = (type === 'Flex') ? ` | HF: ${tarpreis.times(100)} Cent` : '';
            const verbrauchspreis = verbrauch.times(tariffPrice);
            const preis = verbrauchspreis.plus(grundpreis.times(ZP));
            const ersparnis = preis_alt.minus(preis);
            const diff = ersparnis.abs();

            let idx = $('#tarifes #cards .card').length;
            const html = `
              <div class="col-sm-6 col-lg-4 mt-2">
                <div class="card">
                  <div class="card-body">
                    <input type="radio" class="color" name="${contracttype}" value="${contractID}" ${idx === 0 ? 'checked' : ''} />
                    <h5 class="card-title mt-2">${name}</h5>
                    <hr class="custom-hr">
                    <p class="card-text">${tariff.firma}</p>
                    <b>Preis</b> : ${preis}<br>
                    <b>Ersparnis</b> : ${diff} <br>
                    <b>Prov</b> : ${prov} <br>
                    <b>Type</b> : ${type} <br>
                    <b>Contract Type</b> : ${contracttype} <br>
                  </div>
                </div>
              </div>
            `;
            $('#tarifes #cards').append(html);
          }
        }
      } catch (e) {
        console.error('Error fetching or processing data:', e);
      }
    },

    nextField: function (fieldID, nextFieldID) {
      $(`#${fieldID}`).keydown(function (e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          if (nextFieldID) {
            $(`#${nextFieldID}`).focus();
          } else {
            if ($('.tab-label .tab1').hasClass('active')) {
              $('#tab1 #calculate-button').trigger('click');
            } else {
              $('#tab2 #calculate-button').trigger('click');
            }
          }
        }
      });
    },

    Calcprov: function (type) {
      let stufe = new Decimal($('#stufe-select').val());
      const containerId = type === 'strom' ? 'prov-table' : 'prov-table-gas';
      $('#' + containerId).html('<tr><th>Tarif</th><th>Prov</th><th>Monatlich</th></tr>');

      for (let i = 0; i < provArray.length; i++) {
        const tarifName = tarifArray[i];
        const provPos = provArray[i].times(stufe);
        const moProvPos = moProvArray[i].times(stufe);
        const html = `<tr><td>${tarifName}</td><td>${parseFloat(provPos).toFixed(2)} €</td><td>${parseFloat(moProvPos).toFixed(2)} €</td></tr>`;

        $('#' + containerId).append(html);
      }
    },

    loadAndCalculateTariffs: async function () {
      let { verbrauch, ZP, preis_alt, response } = ICreateContract.getContractMetaData('strom');

      $('#AlterPreis').html(`Bisheriger Preis: ${preis_alt.toFixed(2)} €`);
      $('#totalprice').val(preis_alt.toFixed(2));
      $('#AlterPreis').show();

      let closestFlexTariff = null;
      let closestFixTariff = null;
      let smallestFlexDiff = new Decimal(Infinity);
      let smallestFixDiff = new Decimal(Infinity);
      $('#result-table').html('<tr><th>Tarif Art</th><th>Tarif Name</th><th>Preis</th><th>Ersparnis</th></tr>');

      try {
        const data = JSON.parse(response);

        const tariffs = data.Tarife;
        const boerse = new Decimal(data.FixedVal.Boerse);
        const AufschlagE1 = new Decimal(data.FixedVal.AufschlagE1);

        provArray = [];
        moProvArray = [];
        tarifArray = [];

        for (let key in tariffs) {
          if (tariffs.hasOwnProperty(key)) {
            const tariff = tariffs[key];
            const name = key;
            const firma = tariff.firma;
            const tarpreis = new Decimal(tariff.preis);
            const grundpreis = new Decimal(tariff.grundpreis);
            const type = tariff.type;
            const prov = new Decimal(tariff.prov);
            const result = grundpreis * boerse;
            const tariffPrice = (type === 'Flex') ? tarpreis.plus(boerse).plus(AufschlagE1) : tarpreis;
            const HandlingFee = (type === 'Flex') ? ` | HF: ${tarpreis.times(100)} Cent` : '';
            const verbrauchspreis = verbrauch.times(tariffPrice);
            const preis = verbrauchspreis.plus(grundpreis.times(ZP));
            const ersparnis = preis_alt.minus(preis);
            const diff = ersparnis.abs();

            if (INTERN === true) {
              const html =`<tr><td>${type}</td><td>${firma} - ${name}</td><td>${preis.toFixed(2)} €</td><td>${ersparnis.toFixed(2)} €</td></tr>`;
              $('#result-table').append(html);

              //Provberechnung
              const sharexq10 = new Decimal('0.7');
              const overheadtip = new Decimal('0.8');
              const bruttoprov = verbrauch.times(prov);
              const nettoprov = bruttoprov.times(sharexq10);
              const realprov = nettoprov.times(overheadtip);
              const moprov = realprov.div(12);

              provArray.push(realprov);
              moProvArray.push(moprov);
              tarifArray.push(name + HandlingFee);
            } else {
              //check and update Flex
              if (type === 'Flex' && diff.lessThan(smallestFlexDiff)) {
                smallestFlexDiff = diff;
                closestFlexTariff = { type: type, name: firma, preis: preis, ersparnis: ersparnis };
              }
              //check and update Fix
              if (type === "Fix" && diff.lessThan(smallestFixDiff)) {
                smallestFixDiff = diff;
                closestFixTariff = { type: type, name: firma, preis: preis, ersparnis: ersparnis };
              }
            }
          }
        }
      } catch (error) {
        console.error('Error fetching or processing data:', error);
      }

      function addRow(tariff, INTERN) {
        if (!INTERN) {
          const html = `<tr><td>${tariff.type}</td><td>${tariff.name}</td><td>${tariff.preis.toFixed(2)} €</td><td>${tariff.ersparnis.toFixed(2)} €</td></tr>`;
          $('#result-table').append(html);
        }
      }

      if (!INTERN) {
        addRow(closestFlexTariff);
        addRow(closestFixTariff);
      }
    },

    loadAndCalculateTariffs: async function (type) {
      let { verbrauch, ZP, preis_alt, response } = ICreateContract.getContractMetaData(type);

      $('#totalprice').val(preis_alt.toFixed(2));

      const alertContainertId = type === 'strom' ? 'AlterPreis' : 'AlterPreisGas';
      $('#' + alertContainertId).html(`Bisheriger Preis: ${preis_alt.toFixed(2)} €`);
      $('#' + alertContainertId).show();

      let closestFlexTariff = null;
      let closestFixTariff = null;
      let smallestFlexDiff = new Decimal(Infinity);
      let smallestFixDiff = new Decimal(Infinity);

      const resultContainerId = type === 'strom' ? 'result-table' : 'result-table-gas';
      $('#' +resultContainerId).html('<tr><th>Tarif Art</th><th>Tarif Name</th><th>Preis</th><th>Ersparnis</th></tr>');

      try {
        const data = JSON.parse(response);

        const tariffs = data.Tarife;
        const boerse = new Decimal(data.FixedVal.Boerse);
        const AufschlagE1 = new Decimal(data.FixedVal.AufschlagE1);

        provArray = [];
        moProvArray = [];
        tarifArray = [];

        for (let key in tariffs) {
          if (tariffs.hasOwnProperty(key)) {
            const tariff = tariffs[key];
            const name = key;
            const firma = tariff.firma;
            const tarpreis = new Decimal(tariff.preis);
            const grundpreis = new Decimal(tariff.grundpreis);
            const type = tariff.type;
            const prov = new Decimal(tariff.prov);
            const result = grundpreis * boerse;
            const tariffPrice = (type === 'Flex') ? tarpreis.plus(boerse).plus(AufschlagE1) : tarpreis;
            const HandlingFee = (type === 'Flex') ? ` | HF: ${tarpreis.times(100)} Cent` : '';
            const verbrauchspreis = verbrauch.times(tariffPrice);
            const preis = verbrauchspreis.plus(grundpreis.times(ZP));
            const ersparnis = preis_alt.minus(preis);
            const diff = ersparnis.abs();

            if (INTERN === true) {
              const html =`<tr><td>${type}</td><td>${firma} - ${name}</td><td>${preis.toFixed(2)} €</td><td>${ersparnis.toFixed(2)} €</td></tr>`;
              $('#' + resultContainerId).append(html);

              //Provberechnung
              const sharexq10 = new Decimal('0.7');
              const overheadtip = new Decimal('0.8');
              const bruttoprov = verbrauch.times(prov);
              const nettoprov = bruttoprov.times(sharexq10);
              const realprov = nettoprov.times(overheadtip);
              const moprov = realprov.div(12);

              provArray.push(realprov);
              moProvArray.push(moprov);
              tarifArray.push(name + HandlingFee);
            } else {
              //check and update Flex
              if (type === 'Flex' && diff.lessThan(smallestFlexDiff)) {
                smallestFlexDiff = diff;
                closestFlexTariff = { type: type, name: firma, preis: preis, ersparnis: ersparnis };
              }
              //check and update Fix
              if (type === "Fix" && diff.lessThan(smallestFixDiff)) {
                smallestFixDiff = diff;
                closestFixTariff = { type: type, name: firma, preis: preis, ersparnis: ersparnis };
              }
            }
          }
        }
      } catch (e) {
        console.error('Error fetching or processing data:', e);
      }

      function addRow(tariff, INTERN) {
        if (!INTERN) {
          const html = `<tr><td>${tariff.type}</td><td>${tariff.name}</td><td>${tariff.preis.toFixed(2)} €</td><td>${tariff.ersparnis.toFixed(2)} €</td></tr>`;
          $('#' + resultContainerId).append(html);
        }
      }

      if (!INTERN) {
        addRow(closestFlexTariff);
        addRow(closestFixTariff);
      }
    },
  }
}
