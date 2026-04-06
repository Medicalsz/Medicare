<?php

namespace App\MedicarSmartBundle\Service;

use App\Entity\Commande;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * PDF invoice generation service using DomPDF.
 */
class PdfService
{
    /**
     * Generate a PDF invoice for a commande.
     *
     * @return string Raw PDF binary content
     */
    public function generateInvoice(Commande $commande): string
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', false);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);

        $html = $this->buildInvoiceHtml($commande);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->output();
    }

    /**
     * Build the HTML template for the invoice.
     */
    private function buildInvoiceHtml(Commande $commande): string
    {
        $product = $commande->getProduct();
        $unitPrice = $product ? number_format((float) $product->getPrice(), 2) : '0.00';
        $totalPrice = number_format((float) $commande->getTotalPrice(), 2);
        $commandeDate = $commande->getCommandeDate()?->format('F j, Y') ?? 'N/A';
        $commandeNumber = $commande->getCommandeNumber();
        $quantity = $commande->getQuantity();
        $productName = $product?->getName() ?? 'N/A';
        $productSku = $product?->getSku() ?? 'N/A';
        $productType = $product?->getType()->getLabel() ?? 'N/A';
        $status = $commande->getStatus();
        $notes = $commande->getNotes() ?? '—';

        return <<<HTML
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: Helvetica, Arial, sans-serif; color: #333; font-size: 14px; line-height: 1.6; }
    .invoice-container { padding: 40px; }
    .header { display: flex; justify-content: space-between; margin-bottom: 40px; border-bottom: 3px solid #2563eb; padding-bottom: 20px; }
    .company-name { font-size: 28px; font-weight: bold; color: #2563eb; }
    .company-tagline { font-size: 12px; color: #666; }
    .invoice-title { text-align: right; }
    .invoice-title h2 { font-size: 24px; color: #333; margin-bottom: 5px; }
    .invoice-title p { color: #666; font-size: 13px; }
    .invoice-meta { margin-bottom: 30px; }
    .invoice-meta table { width: 100%; }
    .invoice-meta td { padding: 5px 0; vertical-align: top; }
    .label { font-weight: bold; color: #555; width: 150px; }
    .items-table { width: 100%; border-collapse: collapse; margin: 30px 0; }
    .items-table th { background-color: #2563eb; color: white; padding: 12px 15px; text-align: left; font-size: 13px; text-transform: uppercase; }
    .items-table td { padding: 12px 15px; border-bottom: 1px solid #eee; }
    .items-table tr:nth-child(even) { background-color: #f8f9fa; }
    .text-right { text-align: right; }
    .total-section { margin-top: 20px; text-align: right; }
    .total-section table { margin-left: auto; }
    .total-section td { padding: 5px 15px; }
    .total-row { font-size: 18px; font-weight: bold; color: #2563eb; border-top: 2px solid #2563eb; }
    .status-badge { display: inline-block; padding: 4px 12px; border-radius: 4px; font-size: 12px; font-weight: bold; color: white; }
    .status-PAID { background-color: #16a34a; }
    .status-PENDING { background-color: #eab308; color: #333; }
    .status-CANCELLED { background-color: #dc2626; }
    .footer { margin-top: 50px; padding-top: 20px; border-top: 1px solid #ddd; text-align: center; font-size: 11px; color: #999; }
    .notes-section { margin-top: 20px; padding: 15px; background-color: #f8f9fa; border-left: 3px solid #2563eb; }
    .notes-section h4 { margin-bottom: 5px; color: #555; }
</style>
</head>
<body>
<div class="invoice-container">
    <table style="width:100%; margin-bottom: 30px;">
        <tr>
            <td style="vertical-align: top;">
                <div class="company-name">Medicare</div>
                <div class="company-tagline">Medical Products Management</div>
                <p style="margin-top: 10px; font-size: 12px; color: #666;">
                    A108 Adam Street<br>
                    New York, NY 535022<br>
                    info@example.com
                </p>
            </td>
            <td style="text-align: right; vertical-align: top;">
                <h2 style="font-size: 24px; color: #333;">INVOICE</h2>
                <p style="color: #666; font-size: 13px;">#{$commandeNumber}</p>
                <p style="color: #666; font-size: 13px;">Date: {$commandeDate}</p>
                <p style="margin-top: 10px;"><span class="status-badge status-{$status}">{$status}</span></p>
            </td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>SKU</th>
                <th>Type</th>
                <th class="text-right">Unit Price</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>{$productName}</strong></td>
                <td>{$productSku}</td>
                <td>{$productType}</td>
                <td class="text-right">\${$unitPrice}</td>
                <td class="text-right">{$quantity}</td>
                <td class="text-right">\${$totalPrice}</td>
            </tr>
        </tbody>
    </table>

    <div class="total-section">
        <table>
            <tr>
                <td class="label">Subtotal:</td>
                <td class="text-right">\${$totalPrice}</td>
            </tr>
            <tr>
                <td class="label">Tax (0%):</td>
                <td class="text-right">\$0.00</td>
            </tr>
            <tr class="total-row">
                <td style="padding-top: 10px;">Total:</td>
                <td class="text-right" style="padding-top: 10px;">\${$totalPrice}</td>
            </tr>
        </table>
    </div>

    <div class="notes-section">
        <h4>Notes</h4>
        <p>{$notes}</p>
    </div>

    <div class="footer">
        <p>Thank you for your order! | Medicare &copy; 2025 | All rights reserved</p>
        <p>This is a computer-generated invoice and does not require a signature.</p>
    </div>
</div>
</body>
</html>
HTML;
    }
}
