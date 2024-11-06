<?php
namespace App\Services;

use Auth;
use File;
use App\Models\Tax;
use App\Models\QrCode;
use Illuminate\Support\Str;
use App\Models\ConsumerRequest;
use Yajra\Datatables\Datatables;

class AdminQRCodeServiceAll
{
    public function view()
    {
        // Fetch all QR codes from the database
        $allQrCodes = QrCode::all();

        return DataTables::of($allQrCodes)
            ->addIndexColumn()
            ->addColumn('qr_image', function ($row) {
                if ($row->qr_image) {
                    return '<img src="' . asset('storage/' . $row->qr_image) . '" width="50" height="50" />';
                }
                return 'N/A';
            })
            ->editColumn('created_at', function ($row) {
                return date('Y/m/d', strtotime($row->created_at));
            })
            ->addColumn('action', function ($row) {
                
                $deleteUrl = route('admin.qr_codes.destroy', $row->id);

                return '
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;" onsubmit="return confirmDelete()">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>';
            })
            ->editColumn('qr_image', function ($row) {
                // Assuming 'qr_image' column contains the image filename (e.g., 'example.png')
                $imageUrl = asset('storage/images/' . $row->qr_image); // Path to the image
            
                // Return an HTML img tag with the image URL
                return '<img src="' . $imageUrl . '" width="100px" height="100px" alt="QR Code">';
            })
            ->rawColumns(['qr_image', 'action'])  // To render HTML in the table
            ->make(true);
    }
  
}

