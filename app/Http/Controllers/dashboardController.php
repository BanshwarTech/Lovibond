<?php

namespace App\Http\Controllers;

use App\Models\downloadList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class dashboardController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function downloadList()
    {
        $data = downloadList::paginate(1);

        return view('downloadList', compact('data'));
    }

    public function exportCsv()
    {

        $data = downloadList::all();

        // Define the CSV file headers
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=downloadList.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        // Add CSV column names
        $columns = ['#', 'Name', 'Email Address', 'Company Name', 'Category'];

        // Callback to create the CSV content
        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            $index = 0;
            foreach ($data as $client) {
                $index++;
                $row = [
                    $index,
                    $client->name,
                    $client->email,
                    $client->companyname,
                    $client->category,
                ];
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
