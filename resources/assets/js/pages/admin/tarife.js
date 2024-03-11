const { PDFDocument } = PDFLib;

$(document).ready(function () {
  if ($('#wrapper_create_tarife').length > 0 || $('#wrapper_update_tarife').length > 0) {
    $('#contract_pdf').change(function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();

      if (e.target.files.length > 0) {
        $('#btn_delete_pdf_file').removeClass('d-none');
      }
    });

    $('#btn_delete_pdf_file').click(function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();

      $('#contract_pdf').files = [];
      $('#contract_pdf').val('');
      $(this).addClass('d-none');
    });
  }

  if ($('#wrapper_validate_pdf').length > 0) {
    const url = $('#pdf_url').val();
    extractFieldsFromPDF(url).catch(e => console.log(e));

    $('#chk_all').change(function (e) {
      $('#tbl_pdf_fields tbody INPUT[type=checkbox]').prop('checked', $(this).prop('checked'));
    })
  }
});

const extractFieldsFromPDF = async (url) => {
  const tables = {
    tarife: 'Tarife',
    vermittlernummer: 'Vermittlernummer',
    kundens: 'Kunden',
    vertraege: 'Vertraege',
  };

  const getFieldOptions = function () {
    const tableFields = {
      tarife: [
        { field: 'tarife', type: 'text', label: 'Gewählter Tarif', }
      ],
      vermittlernummer: [
        { field: 'vermittlernummer', type: 'text', label: 'Vermittlernummer', }
      ],
      kundens: [
        { field: 'name', type: 'text', label: 'Vorname', },
        { field: 'nachname', type: 'text', label: 'Nachname', },
        { field: 'anrede', type: 'enum', label: 'Herr', value: 'male' },
        { field: 'anrede', type: 'enum', label: 'Frau', value: 'female' },
        { field: 'dob', type: 'text', label: 'Geburtsdatum', },
        { field: 'email', type: 'text', label: 'E-Mail', },
        { field: 'tel_number', type: 'text', label: 'Telefonnummer', },
        { field: 'street', type: 'text', label: 'Straße(Lieferadresse)', },
        { field: 'house_number', type: 'text', label: 'Hausnummer(Lieferadresse)', },
        { field: 'stairs', type: 'text', label: 'Stiege(Lieferadresse)', },
        { field: 'door', type: 'text', label: 'Tür(Lieferadresse)', },
        { field: 'postcode', type: 'text', label: 'PLZ(Lieferadresse)', },
        { field: 'location', type: 'text', label: 'Ort(Lieferadresse)', },
        { field: 'diff_street', type: 'text', label: 'Straße(Rechnungsadresse)', },
        { field: 'diff_house_number', type: 'text', label: 'Hausnummer(Rechnungsadresse)', },
        { field: 'diff_stairs', type: 'text', label: 'Stiege(Rechnungsadresse)', },
        { field: 'diff_door', type: 'text', label: 'Tür(Rechnungsadresse)', },
        { field: 'diff_postcode', type: 'text', label: 'PLZ(Rechnungsadresse)', },
        { field: 'diff_location', type: 'text', label: 'Ort(Rechnungsadresse)', },
        { field: 'title', type: 'text', label: 'Title', },
        { field: 'uid', type: 'text', label: 'UID', },
      ],
      vertraege: [
        { field: 'anummer', type: 'text', label: 'Anlagennummer', },
        { field: 'zpn', type: '[text]', value: 0, label: 'Zählpunkt', },
        { field: 'anummer', type: '[text]', value: 0, label: 'Zählernummer', },
        { field: 'zpn', type: '[text]', value: 1, label: 'Weiterer Zählpunkt', },
        { field: 'anummer', type: '[text]', value: 1, label: 'Weitere Zählnummer', },
        { field: 'jvb', type: 'text', label: 'Jahresverbrauch ca', },
        { field: 'nb', type: 'text', label: 'Netzbetreiber', },
        { field: 'bic', type: 'text', label: 'Creditor-ID', },
        { field: 'kontoinhaber', type: 'text', label: 'Kontoinhaber', },
        { field: 'iban', type: 'text', label: 'IBAN', },
        { field: 'zahlungsart', type: 'enum', value: '0', label: 'Per Zahlschein', },
        { field: 'zahlungsart', type: 'enum', value: '1', label: 'Per Lastschrift', },
        { field: 'kontaktart', type: 'text', label: 'Kontaktart', },
        { field: 'firmenname', type: 'text', label: 'Firmenname', },
      ],
    }

    let fieldOptions = '';

    const tableKeys = Object.keys(tables);
    for (let i = 0; i < tableKeys.length; i++) {
      const fieldList = tableFields[tableKeys[i]];
      fieldOptions += `<optgroup label="${tables[tableKeys[i]]}">`;
      for (let j = 0; j < fieldList.length; j++) {
        let val = `${tableKeys[i]}-${fieldList[j].field}-${fieldList[j].type}`;
        if (fieldList[j].type !== 'text') {
          val = val + '-' + fieldList[j].value;
        }
        fieldOptions += `<option value="${val}">${fieldList[j].label}</option>`;
      }
      fieldOptions += '</optgroup>';
    }

    return fieldOptions;
  }

  const formPdfBytes = await fetch(url).then(res => res.arrayBuffer());
  const pdfDoc = await PDFDocument.load(formPdfBytes);
  const form = pdfDoc.getForm();
  const pdfFields = form.getFields();
  const $table = $('#wrapper_validate_pdf #tbl_pdf_fields');

  $('#chk_all').prop('checked', true);

  for (let i = 0; i < pdfFields.length; i++) {
    const field = pdfFields[i];
    const type = field.constructor.name
    const name = field.getName();
    const fieldOptions = getFieldOptions();
    $table.find('tbody').append(`
      <tr>
      <td><input type="checkbox" name="fields[${i}][checked]" value="1" checked /></td>
      <td>${type}<input type="hidden" name="fields[${i}][type]" value="${type}" /></td>
      <td>${name}<input type="hidden" name="fields[${i}][name]" value="${name}" /></td>
      <td><select name="fields[${i}][fields][]" class="sel-field select2" style="width: 250px;" multiple>${fieldOptions}</select></td>
      </tr>
    `);
  }

  let matchedFields = [];
  try {
    const t = $('#hid_fields').val();
    matchedFields = JSON.parse(t);
    matchedFields = JSON.parse(matchedFields)
  } catch {
    matchedFields = [];
  }
  for (let i = 0; i < pdfFields.length; i++) {
    let matchedField = matchedFields.find(v => v.name === pdfFields[i].getName());
    let selectedFields = [];
    if (matchedField && matchedField.fields.length > 0) {
      selectedFields = matchedField.fields.split(',');
    }

    let selectbox = $('.sel-field').get(i);
    $(selectbox).val(selectedFields);
  }

  $('.sel-field').select2({
    multiple: true
  });

  /*$('.sel-table').each(function (idx) {
    $(this).change(function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();

      const tableKey = $(this).val();
      fieldOptions = '';

      if (tableKey !== '') {
        const fieldList = tableFields[tableKey];
        for (let i = 0; i < fieldList.length; i++) {
          let val = `${fieldList[i].field}-${fieldList[i].type}`;
          if (fieldList[i].type !== 'text') {
            val = val + '-' + fieldList[i].value;
          }
          fieldOptions += `<option value="${val}">${fieldList[i].label}</option>`;
        }
      }
      $($('.sel-field').get(idx)).html(`<option value="" selected></option>${fieldOptions}`);
    })
  });*/

  /*$('.sel-field').each(function (idx) {
    $(this).change(function (e) {
      e.preventDefault();
      e.stopImmediatePropagation();

      const field = $(this).val();
      const table = $($('.sel-table').get(idx)).val();

      for (let i = 0; i < pdfFields.length; i++) {
        if (i === idx) continue;

        const s_table = $($('.sel-table').get(i)).val();
        const s_field = $($('.sel-field').get(i)).val();

        if (s_table === table && s_field === field) {
          alert('Could not select the field already used');
          $($('.sel-field').get(idx)).val('');
        }
      }

    });
  });*/
}

const validatePdfFields = (e) => {
  e.preventDefault();
  e.stopImmediatePropagation();
  return true;
}
