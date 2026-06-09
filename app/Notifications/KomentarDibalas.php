<?php

namespace App\Notifications;

use App\Models\Komentar;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class KomentarDibalas extends Notification
{
    use Queueable;

    public function __construct(
        public Komentar $komentarBaru,
        public User $pengirim,
    ) {}

    public function via(object $notifiable): array
    {
        return $notifiable->email_notifikasi ? ['mail'] : [];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $judulKonten = $this->komentarBaru->commentable?->judul ?? 'Konten';
        $url = $this->komentarBaru->commentable instanceof \App\Models\InformasiAdat
            ? route('informasi.show', $this->komentarBaru->commentable)
            : route('kegiatan.show', $this->komentarBaru->commentable);

        return (new MailMessage)
            ->subject("Balasan komentar pada \"{$judulKonten}\"")
            ->greeting("Halo {$notifiable->name}!")
            ->line("{$this->pengirim->name} membalas komentar Anda pada \"{$judulKonten}\".")
            ->line("Balasan: \"{$this->komentarBaru->body}\"")
            ->action('Lihat Komentar', $url)
            ->line('Terima kasih telah berpartisipasi di forum diskusi Adat Desa Poto.');
    }
}
