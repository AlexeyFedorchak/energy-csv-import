<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vertrag extends Model
{
  use HasFactory;

  protected $table = 'vertraege'; // Specify the table name if it differs from the model name convention

  protected $fillable = [
    'vertragstyp', // Assuming it's an array
    'kundentyp', // Assuming it's an integer
    'energieanbieter', // Assuming it's an integer
    'name',
    'contract_type',
    'kwh_strom',
    'kwh_gas',
    'team_id',
    'partnerid',
    'created_by',
    'stiege',
    'tuer',
    'plz',
    'ort',
    'telefon',
    'firmenbuchnummer', // Assuming it's nullable
    'uid', // Assuming it's nullable
    'lfbis', // Assuming it's nullable
    'branche', // Assuming it's nullable
    'unterzeichner',
    'betreuer', // Assuming it's nullable
    'handlingfee',
    'kundenkennwort',
    'mail', // Assuming it's an email address
    'anmeldetyp', // Assuming it's an integer
    'bank', // Assuming it's nullable
    'iban', // Assuming it's nullable
    'bic', // Assuming it's nullable
    'kontoinhaber', // Assuming it's nullable
    'zaehlpunktnummer', // Assuming it's nullable
    'jvb', // Assuming it's nullable
    'nb', // Assuming it's nullable
    'aktuellerlieferant', // Assuming it's nullable
    'zpn', // Assuming it's nullable
    'anummer', // Assuming it's nullable
    'vertragsdauer', // Assuming it's a date
    'tarife_id',
    'firmenname',
    'kontaktart',
    'netzbetreibernummer',
    'zahlungsart',
    'signed_pdf_path',
    'unsigned_pdf_path'
  ];

  // You can define any additional methods or relationships here if needed
}
