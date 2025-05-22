<div class="total-login-container">
<div class="container mx-auto bg-white rounded-table shadow-lg overflow-hidden">
        <h1 class="text-3xl font-bold text-center text-gray-800 py-6 px-4 bg-indigo-50">
            Şikayət Cədvəli Şeması
        </h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider rounded-tl-lg">
                        Suallar
                    </th>
                    <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider rounded-tr-lg">
                        Cavablar
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Anonim</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $name === null ? 'Bəli' : 'Xeyr' ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Ad</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $name === null ? 'Boşdur' : $name ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Soyad</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $surname === null ? 'Boşdur' : $surname ?><td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Telefon</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $phone === null ? 'Boşdur' : $phone ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Email</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $email === null ? 'Boşdur' : $email ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Hadisə yeri</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $location ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Hadisə tarixi</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $event_date ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Hadisənin baş vermə saat aralığı</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $hours_range ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Hadisə haqqında detallar</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $complain_details ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">İştirak edən şəxslər və vəzifləri</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $people ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Şikayətin verilmə tarixi</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $created_at ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Daxil edilən fayllar</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500">
                        <?php if (!empty($files) && is_array($files)): ?>
                            <?php foreach ($files as $key => $file): ?>
                                <div>
                                    <a href="<?= $file['file_path'] ?>" target="_blank">
                                        <?= basename($file['file_path']) ?>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Fayl tapılmadı.</p>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <h1 class="text-3xl font-bold text-center text-gray-800 py-6 px-4 bg-indigo-50">
            Şikayətə gələn cavab
        </h1>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider rounded-tl-lg">
                        Suallar
                    </th>
                    <th scope="col" class="py-3 px-6 text-left text-xs font-medium uppercase tracking-wider rounded-tr-lg">
                        Cavablar
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Cavab verən şəxs</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $responser === null ? 'Cavab gəlməyib' : $responser ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Verilən cavab</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $response === null ? 'Cavab gəlməyib' : $response ?></td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">Status</td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500"><?= $status === null ? 'Şikayət göndərilib' : $status ?><td>
                </tr>
            </tbody>
        </table>
    </div>
</div>