<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HeroSliderModel;

class SliderController extends BaseController
{
    protected $sliderModel;

    public function __construct()
    {
        $this->sliderModel = new HeroSliderModel();
    }

    public function index()
    {
        $data = [
            'title'   => 'Manajemen Slider Hero Homepage',
            'sliders' => $this->sliderModel->orderBy('urutan', 'ASC')->findAll(),
        ];

        return view('admin/slider/index', $data);
    }

    public function create()
    {
        $data = [
            'title'  => 'Tambah Slide Hero Baru',
            'slider' => null,
        ];

        return view('admin/slider/form', $data);
    }

    public function store()
    {
        $rules = [
            'title'    => 'required|min_length[3]|max_length[255]',
            'subtitle' => 'permit_empty',
            'tag'      => 'permit_empty|max_length[150]',
            'cta_text' => 'permit_empty|max_length[100]',
            'cta_link' => 'permit_empty|max_length[255]',
            'urutan'   => 'permit_empty|numeric',
            'status'   => 'required|in_list[aktif,nonaktif]',
            'image'    => 'uploaded[image]|max_size[image,5120]|ext_in[image,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = 'images/background.webp';
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $dir = FCPATH . 'uploads/slider';
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $newName = $file->getRandomName();
            $file->move($dir, $newName);
            $imagePath = 'uploads/slider/' . $newName;
        }

        $this->sliderModel->insert([
            'tag'      => (string) $this->request->getPost('tag'),
            'title'    => (string) $this->request->getPost('title'),
            'subtitle' => (string) $this->request->getPost('subtitle'),
            'image'    => $imagePath,
            'cta_text' => (string) $this->request->getPost('cta_text'),
            'cta_link' => (string) $this->request->getPost('cta_link'),
            'urutan'   => (int) ($this->request->getPost('urutan') ?: 1),
            'status'   => (string) $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/slider'))->with('success', 'Slide hero berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $slider = $this->sliderModel->find($id);
        if (! $slider) {
            return redirect()->to(base_url('admin/slider'))->with('error', 'Data slide tidak ditemukan.');
        }

        $data = [
            'title'  => 'Edit Slide Hero Homepage',
            'slider' => $slider,
        ];

        return view('admin/slider/form', $data);
    }

    public function update(int $id)
    {
        $slider = $this->sliderModel->find($id);
        if (! $slider) {
            return redirect()->to(base_url('admin/slider'))->with('error', 'Data slide tidak ditemukan.');
        }

        $rules = [
            'title'    => 'required|min_length[3]|max_length[255]',
            'subtitle' => 'permit_empty',
            'tag'      => 'permit_empty|max_length[150]',
            'cta_text' => 'permit_empty|max_length[100]',
            'cta_link' => 'permit_empty|max_length[255]',
            'urutan'   => 'permit_empty|numeric',
            'status'   => 'required|in_list[aktif,nonaktif]',
            'image'    => 'permit_empty|max_size[image,5120]|ext_in[image,jpg,jpeg,png,webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'tag'      => (string) $this->request->getPost('tag'),
            'title'    => (string) $this->request->getPost('title'),
            'subtitle' => (string) $this->request->getPost('subtitle'),
            'cta_text' => (string) $this->request->getPost('cta_text'),
            'cta_link' => (string) $this->request->getPost('cta_link'),
            'urutan'   => (int) ($this->request->getPost('urutan') ?: 1),
            'status'   => (string) $this->request->getPost('status'),
        ];

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $dir = FCPATH . 'uploads/slider';
            if (! is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $newName = $file->getRandomName();
            $file->move($dir, $newName);
            $data['image'] = 'uploads/slider/' . $newName;

            // Hapus file lama jika ada dan tersimpan di folder uploads
            if (! empty($slider['image']) && str_starts_with($slider['image'], 'uploads/slider/')) {
                $oldFile = FCPATH . $slider['image'];
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
        }

        $this->sliderModel->update($id, $data);

        return redirect()->to(base_url('admin/slider'))->with('success', 'Slide hero dan teks berhasil diperbarui.');
    }

    public function delete(int $id)
    {
        $slider = $this->sliderModel->find($id);
        if ($slider) {
            if (! empty($slider['image']) && str_starts_with($slider['image'], 'uploads/slider/')) {
                $oldFile = FCPATH . $slider['image'];
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            $this->sliderModel->delete($id);
            return redirect()->to(base_url('admin/slider'))->with('success', 'Slide berhasil dihapus.');
        }

        return redirect()->to(base_url('admin/slider'))->with('error', 'Data tidak ditemukan.');
    }
}
