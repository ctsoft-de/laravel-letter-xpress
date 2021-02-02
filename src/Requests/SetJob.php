<?php

namespace CTSoft\Laravel\LetterXpress\Requests;

use CTSoft\Laravel\LetterXpress\Models\Letter;

class SetJob
{
    /**
     * Get the payload.
     *
     * @param Letter $letter
     * @return array
     */
    public static function getPayload(Letter $letter): array
    {
        $document = base64_encode($letter->getDocument());

        $payload = [
            'letter' => [
                'base64_file'     => $document,
                'base64_checksum' => md5($document),
                'address'         => $letter->getAddress() ?? 'read',
                'specification'   => [
                    'color' => $letter->isColor() ? 4 : 1,
                    'mode'  => $letter->isDuplex() ? 'duplex' : 'simplex',
                    'ship'  => $letter->isInternational() ? 'international' : 'national',
                    'c4'    => $letter->isC4ShippingBag() ? 'y' : 'n',
                ],
            ],
        ];

        if (!is_null($letter->getDispatchDate())) {
            $payload['letter']['dispatchdate'] = $letter->getDispatchDate()->format('d.m.Y');
        }

        return $payload;
    }

    /**
     * Get the letter.
     *
     * @param array $response
     * @return Letter
     */
    public static function getLetter(array $response): Letter
    {
        $letter = new Letter();

        $letter->setJobId($response['letter']['job_id']);
        $letter->setColor((int)$response['letter']['specification']['color'] === 4);
        $letter->setDuplex($response['letter']['specification']['mode'] === 'duplex');
        $letter->setInternational($response['letter']['specification']['ship'] === 'international');
        $letter->setPages($response['letter']['specification']['page']);
        $letter->setPrice($response['letter']['price']);
        $letter->setStatus($response['letter']['status']);

        if (!empty($response['letter']['address'])) {
            $letter->setAddress($response['letter']['address']);
        }

        if (!empty($response['notice']['balance'])) {
            $letter->setBalanceNotice($response['notice']['balance']);
        }

        if (!empty($response['notice']['timer'])) {
            $letter->setTimerNotice($response['notice']['timer']);
        }

        return $letter;
    }
}
