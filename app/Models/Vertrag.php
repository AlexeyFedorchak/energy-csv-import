<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vertrag extends Model
{
  use HasFactory;

  const MONTHLY = 0;
  const ANNUAL = 1;

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

  public function abrechnungen()
  {
      return $this->hasMany(Abrechnung::class, 'contract_id');
  }

  public function checkExistingContracts(Carbon $period): bool
  {
      if ($this->monat_or_year == self::MONTHLY) {
          $start = $period->copy()->startOfMonth();
          $end = $period->copy()->endOfMonth();
      } else {
          $start = $period->copy()->startOfYear();
          $end = $period->copy()->endOfYear();
      }

      return $this->abrechnungen()
        ->whereBetween('period', [$start, $end])
        ->exists();
  }
}
