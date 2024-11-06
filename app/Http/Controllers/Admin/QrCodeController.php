<?php

namespace App\Http\Controllers\Admin;

use App\Models\QrCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AdminQrCodeServiceAll;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class QrCodeController extends Controller
{
    //
    protected $qrCodeService;

    public function __construct(AdminQrCodeServiceAll $qrCodeService)
    {
        $this->qrCodeService = $qrCodeService;
    }

    // Fetch and display QR codes using DataTables
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->qrCodeService->view();
        }

        return view('admin.qrcode.index');
    }
    public function create()
    {
        return view('admin.qrcode.create');
    }

    // Store the newly created QR code
    public function store(Request $request)
    {
        // dd("hii");
       
        $validator = Validator::make($request->all(), [
           'upi_id' => 'required|max:255',
            'qr_image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $this->qrCodeService->store($request);
        if ($request->hasFile('qr_image')) {
            $thumbnailImage = $request->file('qr_image');
            $thumbnailImageName = Str::random(10) . '.' . $thumbnailImage->getClientOriginalExtension();
            $thumbnailImage->storeAs('public/images', $thumbnailImageName);
            $data['qr_image']=$thumbnailImageName ?? null;
            // $data['qr_image'] = $request->file('qr_image')->store('qr_codes', 'public');
        }
        $data['upi_id']=$request->upi_id;

         QrCode::create($data);

        return redirect()->route('admin.qr_codes.index')->with('success', 'QR code created successfully.');
    }

    public function destroy($id)
    {
        $qrCode = QrCode::findOrFail($id);

        // Delete the QR image from storage, if it exists
        if ($qrCode->qr_image && Storage::disk('public')->exists($qrCode->qr_image)) {
            Storage::disk('public')->delete($qrCode->qr_image);
        }

        // Delete the QR code entry from the database
        $qrCode->delete();

        return redirect()->route('admin.qr_codes.index')->with('success', 'QR Code deleted successfully.');
    }
}
