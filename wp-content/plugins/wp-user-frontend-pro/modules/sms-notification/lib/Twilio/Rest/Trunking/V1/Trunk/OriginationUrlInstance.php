<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Trunking\V1\Trunk;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Version;

/**
 * @property string accountSid
 * @property string sid
 * @property string trunkSid
 * @property string weight
 * @property string enabled
 * @property string sipUrl
 * @property string friendlyName
 * @property string priority
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string url
 */
class OriginationUrlInstance extends InstanceResource {
    /**
     * Initialize the OriginationUrlInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $trunkSid The trunk_sid
     * @param string $sid The sid
     * @return \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlInstance 
     */
    public function __construct(Version $version, array $payload, $trunkSid, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'accountSid' => $payload['account_sid'],
            'sid' => $payload['sid'],
            'trunkSid' => $payload['trunk_sid'],
            'weight' => $payload['weight'],
            'enabled' => $payload['enabled'],
            'sipUrl' => $payload['sip_url'],
            'friendlyName' => $payload['friendly_name'],
            'priority' => $payload['priority'],
            'dateCreated' => Deserialize::iso8601DateTime($payload['date_created']),
            'dateUpdated' => Deserialize::iso8601DateTime($payload['date_updated']),
            'url' => $payload['url'],
        );
        
        $this->solution = array(
            'trunkSid' => $trunkSid,
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\Trunking\V1\Trunk\OriginationUrlContext Context for
     *                                                              this
     *                                                              OriginationUrlInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new OriginationUrlContext(
                $this->version,
                $this->solution['trunkSid'],
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a OriginationUrlInstance
     * 
     * @return OriginationUrlInstance Fetched OriginationUrlInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the OriginationUrlInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the OriginationUrlInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return OriginationUrlInstance Updated OriginationUrlInstance
     */
    public function update($options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Trunking.V1.OriginationUrlInstance ' . implode(' ', $context) . ']';
    }
}